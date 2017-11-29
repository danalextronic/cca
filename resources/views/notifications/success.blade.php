<div style="position:absolute; width:100% ;" class="alert alert-{{ Session::get('flash_notification.level') }}">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<div class="text-center">
    	{{ Session::get('flash_notification.message') }}
    </div>
</div>