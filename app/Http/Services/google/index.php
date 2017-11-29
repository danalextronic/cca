<?php
use App\Http\Services\GoogleDriveFileService ;
use App\AdminNonPushedFile ;
use App\Application ;
session_start();
$url_array = explode('?', 'http://'.$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$url = $url_array[0];
require_once 'src/Google_Client.php';
require_once 'src/contrib/Google_DriveService.php';
$client = new Google_Client();
$client->setClientId('923550581222-4qsciritqn8jspv2mmdupdgbep246ah5.apps.googleusercontent.com');
$client->setClientSecret('-m9uul3ebY6r4gpiHllemZX4');
$client->setRedirectUri('http://application.contractorcompliance.com.au/admin/drive');
//$client->setRedirectUri('http://cca.app/admin/drive');

$client->setScopes(array('https://www.googleapis.com/auth/drive'));
if (isset($_GET['code'])) {
    $_SESSION['accessToken'] = $client->authenticate($_GET['code']);
    header('location:'.$url);exit;
} elseif (!isset($_SESSION['accessToken'])) {
    $client->authenticate();
}
$files = AdminNonPushedFile::get() ;
if (!empty($_POST)) {
    $client->setAccessToken($_SESSION['accessToken']);
    $service = new Google_DriveService($client);
    $finfo = finfo_open(FILEINFO_MIME_TYPE);


    foreach ($files as $filename) {
        $result = Application::select('ref')->where('idapplication',$filename['applications_idapplication'])->first() ;
        $ref = $result->ref ;
        /******* File Creation ***********/
        $file = new Google_DriveFile() ;
        $file_path = storage_path()."/"."app/".$filename['applications_contractors_idcontractors'].'/'.$filename['applications_idapplication'].'/'.date('y-m-d',strtotime($filename['created_at'])).'/'.$filename['filename'];

        $mime_type = finfo_file($finfo, $file_path);
        $file->setTitle($filename['filename']);
        $file->setDescription('This is a '.$mime_type.' document');
        $file->setMimeType($mime_type);
        /******* File Creation  END ***********/
        
        $GoogleDriveFileService = new GoogleDriveFileService ;
        $idRootFolder = $GoogleDriveFileService->getRootFolderId(Auth::guard('admin')->user()->id) ;
       //$service->files->trash('0B0dBKv1mw1MLRDZPTnlQWm9lTms') ;
        /*  
        // Check if folder id for this contractor  already exist 
        $GoogleDriveFileService = new GoogleDriveFileService ;
        $idFolderContractor = $GoogleDriveFileService->getFolderContractorId($filename['applications_contractors_idcontractors']) ;
        */
        if (!$idRootFolder) {
            /*******Application Root Folder Creation ***********/
            $folder1=new Google_DriveFile();
            $folder1->setTitle('Web-Application');
            $folder1->setMimeType('application/vnd.google-apps.folder');
            try {
                $createdFolder = $service->files->insert($folder1,array(
                    'mimeType' => 'application/vnd.google-apps.folder'
                ));

            }

            catch (Exception $e) {
              print "An error occurred: " . $e->getMessage();
            }
            /******* END Root Folder Creation ***********/
            // Get Id folder1
            $files = $service->files->listFiles(array('maxResults' => 1));
            $folderId1 = $files['items'][0]['id']; 
            
            /******* FOLDER Date Creation *************/
            $folder2=new Google_DriveFile();
            $folder2->setTitle(date('y-m-d',strtotime($filename['created_at'])));
            $folder2->setMimeType('application/vnd.google-apps.folder');
            /******* FOLDER PARENT Folder 1 REFERENCE TO FOLDER2 ***********/
            
            $parentFolder1 = new Google_ParentReference() ;
            $parentFolder1->setId($folderId1) ;          
            $folder2->setParents(array($parentFolder1)) ;
              
            /****** END  PARENT FOLDER 1 REFERENCE TO FOLDER 2 ********/
            try {
                $createdFolder2 = $service->files->insert($folder2,array(
                    'mimeType' => 'application/vnd.google-apps.folder'
                ));

            }

            catch (Exception $e) {
              print "An error occurred: " . $e->getMessage();
            }
            /*******  END folder date creation **********/
            // Get Id folder2
            $files = $service->files->listFiles(array('maxResults' => 1));
            $folderId2 = $files['items'][0]['id']; 

            /******* FOLDER 3 Application Creation *************/
            $folder3=new Google_DriveFile();
            $folder3->setTitle($ref);
            $folder3->setMimeType('application/vnd.google-apps.folder');
           
            /******* FOLDER PARENT Folder 2 REFERENCE TO FOLDER3 ***********/
            
            $parentFolder2 = new Google_ParentReference() ;
            $parentFolder2->setId($folderId2) ;    
            $folder3->setParents(array($parentFolder2)) ;
              
            /****** END FOLDER PARENT REFERENCE TO FOLDER 3 ********/
            try {
                $createdFolder3 = $service->files->insert($folder3,array(
                    'mimeType' => 'application/vnd.google-apps.folder'
                ));

            }

            catch (Exception $e) {
              print "An error occurred: " . $e->getMessage();
            }
            /*******  END folder 3 DATE creation **********/
            // Get Id folder3
            $files = $service->files->listFiles(array('maxResults' => 1));
            $folderId3 = $files['items'][0]['id']; 
            
            $parentFolder3 = new Google_ParentReference() ;
            $parentFolder3->setId($folderId3) ;
            $file->setParents(array($parentFolder3)) ;
            $service->files->insert(
            $file,
            array(
                'data' => file_get_contents($file_path),
                'mimeType' => $mime_type

                )
            );
            $files = $service->files->listFiles(array('maxResults' => 1));
            $idFile =  $files['items'][0]['id']; 
            $googleDriveFileService = new GoogleDriveFileService ;
            $googleDriveFileService->store($idFile,$filename['filename'],$folderId1,$folderId2,$folderId3,$filename['applications_idapplication'],$filename['applications_contractors_idcontractors']);

            /*$parent = new Google_ParentReference() ;
            $parent->setId($foldId) ;
            $file->setParents(array($parent)) ;
            $idFolderParent = $foldId ; /*
            /******* END FOLDER PARENT REFERENCE TO FILE ***********/        
            
        }
        
        else {
           $GoogleDriveFileService1 = new GoogleDriveFileService ;
           $idFolderDate = $GoogleDriveFileService1->getFolderDateId($filename['created_at']) ;
           if (!$idFolderDate) {
                /******* FOLDER DATE Creation *************/
                $folder2=new Google_DriveFile();
                $folder2->setTitle(date('y-m-d',strtotime($filename['created_at'])));
                $folder2->setMimeType('application/vnd.google-apps.folder');
                /******* FOLDER PARENT Folder 1 REFERENCE TO FOLDER2 ***********/
                
                $parentFolder1 = new Google_ParentReference() ;
                $parentFolder1->setId($idRootFolder) ;          
                $folder2->setParents(array($parentFolder1)) ;
                  
                /****** END  PARENT FOLDER 1 REFERENCE TO FOLDER 2 ********/
                try {
                    $createdFolder2 = $service->files->insert($folder2,array(
                        'mimeType' => 'application/vnd.google-apps.folder'
                    ));

                }

                catch (Exception $e) {
                  print "An error occurred: " . $e->getMessage();
                }
                /*******  END folder DATE creation **********/
                // Get Id folder2
                $files = $service->files->listFiles(array('maxResults' => 1));
                $folderId2 = $files['items'][0]['id']; 

                /******* FOLDER 3 DATE Creation *************/
                $folder3=new Google_DriveFile();
                $folder3->setTitle($ref);
                $folder3->setMimeType('application/vnd.google-apps.folder');
                
                /******* FOLDER PARENT Folder 2 REFERENCE TO FOLDER3 ***********/
                
                $parentFolder2 = new Google_ParentReference() ;
                $parentFolder2->setId($folderId2) ;    
                $folder3->setParents(array($parentFolder2)) ;
                  
                /****** END FOLDER PARENT REFERENCE TO FOLDER 3 ********/
                try {
                    $createdFolder3 = $service->files->insert($folder3,array(
                        'mimeType' => 'application/vnd.google-apps.folder'
                    ));

                }

                catch (Exception $e) {
                  print "An error occurred: " . $e->getMessage();
                }
                /*******  END folder 3 DATE creation **********/
                // Get Id folder3
                $files = $service->files->listFiles(array('maxResults' => 1));
                $folderId3 = $files['items'][0]['id']; 
                
                $parentFolder3 = new Google_ParentReference() ;
                $parentFolder3->setId($folderId3) ;
                $file->setParents(array($parentFolder3)) ;
                $service->files->insert(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type

                    )
                );

                $idFile =  $files['items'][0]['id']; 
                $googleDriveFileService = new GoogleDriveFileService ;
                $googleDriveFileService->store($idFile,$filename['filename'],$idRootFolder,$folderId2,$folderId3,$filename['applications_idapplication'],$filename['applications_contractors_idcontractors']);

           }

           else {
              $GoogleDriveFileService2 = new GoogleDriveFileService ;
              $idFolderApplication = $GoogleDriveFileService2->getFolderApplicationId($filename['applications_idapplication']) ;
            
              if (!$idFolderApplication) {
                /******* FOLDER 3 DATE Creation *************/
                $folder3=new Google_DriveFile();
                $folder3->setTitle($ref);
                $folder3->setMimeType('application/vnd.google-apps.folder');
                
                /******* FOLDER PARENT Folder 2 REFERENCE TO FOLDER3 ***********/
                
                $parentFolder2 = new Google_ParentReference() ;
                $parentFolder2->setId($idFolderDate) ;    
                $folder3->setParents(array($parentFolder2)) ;
                  
                /****** END FOLDER PARENT REFERENCE TO FOLDER 3 ********/
                try {
                    $createdFolder3 = $service->files->insert($folder3,array(
                        'mimeType' => 'application/vnd.google-apps.folder'
                    ));

                }

                catch (Exception $e) {
                  print "An error occurred: " . $e->getMessage();
                }
                /*******  END folder 3 DATE creation **********/
                // Get Id folder3
                $files = $service->files->listFiles(array('maxResults' => 1));
                $folderId3 = $files['items'][0]['id']; 
                
                $parentFolder3 = new Google_ParentReference() ;
                $parentFolder3->setId($folderId3) ;
                $file->setParents(array($parentFolder3)) ;
                $service->files->insert(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type

                    )
                );

                $idFile =  $files['items'][0]['id']; 
                $googleDriveFileService = new GoogleDriveFileService ;
                $googleDriveFileService->store($idFile,$filename['filename'],$idRootFolder,$idFolderDate,$folderId3,$filename['applications_idapplication'],$filename['applications_contractors_idcontractors']);
              }

              else {
                if($filename['filename'] != 'application-report.pdf') {
                    // delete file if already exists
                    $googleDriveFileService = new GoogleDriveFileService ;
                    $idPreviousFile = $googleDriveFileService->getFileByIdsAndDate($filename['filename'],$filename['applications_idapplication'],$filename['created_at']) ;
                    
                   if ($idPreviousFile != null) {
                        $service->children->delete($idFolderApplication,$idPreviousFile) ;
                   } 
                }
                
               
               // end delete file
                $parentFolder3 = new Google_ParentReference() ;
                $parentFolder3->setId($idFolderApplication) ;
                $file->setParents(array($parentFolder3)) ;
                $service->files->insert(
                $file,
                array(
                    'data' => file_get_contents($file_path),
                    'mimeType' => $mime_type

                    )
                );
                $files = $service->files->listFiles(array('maxResults' => 1));
               // var_dump($files) ;
                $idFile =  $files['items'][0]['id']; 
                $googleDriveFileService1 = new GoogleDriveFileService ;
                $googleDriveFileService1->store($idFile,$filename['filename'],$idRootFolder,$idFolderDate,$idFolderApplication,$filename['applications_idapplication'],$filename['applications_contractors_idcontractors']);
              }
           }
        }

        
       /* $files = $service->files->listFiles(array('maxResults' => 1));
        $idFile =  $files['items'][0]['id']; 
        $googleDriveFileService = new GoogleDriveFileService ;
        $googleDriveFileService->store($idFile,$idFolderParent,$filename['applications_idapplication'],$filename['applications_contractors_idcontractors']); */
    }


    finfo_close($finfo);
    AdminNonPushedFile::truncate() ;
    header('Location: '.url('/admin/home')); exit ;
}
include 'view.php';