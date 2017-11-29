<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $array = array('public liability insurance (min $10 million) (mandatory','Workers Compensation Policy Insurance','Income Protection/Top Up Insurance','Registration of ABN or Pty Ltd Company.','ATO Portal receipt/BAS lodgement receipt','Payroll Tax (If Applicable)','Industry Redundancy Fund' ,'Long Service Leave Levy','Industry Licences/Training Certificates Register','OHS Induction Card/Asbestos Awareness Cert','Employee Details', 'Employee Agreements', 'Employee Payslips', 'Employee Superannuation', 'Employee Immigration/Vevo', 'Sub Contractors', 'Sub Contractor Agreements' , 'Sub contractor: Sole Trader superannuation', 'IRE certificate – ACT Projects only', 'FWC compliance letter', 'OHS/EHS Management Plan/SWMS requirements', 'Drug & Alcohol Policy', 'Plant & Equipment register');
        foreach ($array as $key => $value) {
            
            DB::table('reportSections')->insert([
                'sectionName' => $value
            ]);
        }
    }
}
