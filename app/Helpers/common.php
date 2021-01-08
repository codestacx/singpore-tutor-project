 <?php

use \Illuminate\Support\Facades\Session;
function uploadFile($files,$path){
    $path = ltrim($path,'/');
    $uploads = array();
    foreach ($files as  $file){

        $orginalName = $file->getClientOriginalName();
        $newName = time().'_'.$orginalName;
        array_push($uploads,$newName);
        $file->move(public_path().'/'.$path,$newName);

    }

    return $uploads;
}




function generateFlashMessage(){

    $status = Session::has('success') || Session::has('error') ? true:false;

    $class = Session::has('success') ? 'alert alert-success':'alert alert-danger';

    $messgae = Session::has('success') ? Session::get('success'):Session::get('error');

    ob_start();
    if($status){
        ?>
            <div class="<?=$class?>">
                <?= $messgae ?>
            </div>
    <?php
    }

    echo ob_get_clean();

}



function getFormDataObject($request){
    $formData = [];
    foreach ($request as $key=>$value){
        $formData[$key] = isset($value) ? $value:'';
    }

    return $formData;

}
?>


