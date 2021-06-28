<?php

use \Illuminate\Support\Facades\Session;
function generateUniqueCode(){
    $codes  = \App\Models\Assignment::all()->pluck('code')->toArray();

    $ccode = strtoupper(\Illuminate\Support\Str::random(10));

    if(count($codes) == 0){
        return $ccode;
    }
    while (true && count($codes) > 0){

        if(!in_array($ccode,$codes)){
            return $ccode;
        }
        $ccode = strtoupper(\Illuminate\Support\Str::random(10));
    }


}

function convertSubjectsJSONto($json){

    ob_start();
    ?>
    <?php foreach (json_decode($json) as $item): ?>
        <p><i class="fa fa-check" style="color: #2cdd9b"><?php echo \App\Models\Subject::where('subject_id',$item)->first()->subject_title; ?></i> </p>
    <?php
        endforeach;
        echo ob_get_clean();
}

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


function getBadgeClass($type){
    switch ($type){
        case 'Urgent':
            return ' <span class="badge badge-danger">'.$type.'</span>';
        case 'Regular':
            return ' <span class="badge badge-primary">'.$type.'</span>';
        case 'Featured':
            return ' <span class="badge badge-warning">'.$type.'</span>';
        default:
            return ' <span class="badge badge-info">'.$type.'</span>';
    }
}


function getLocationAndPlace($place_id,$places){

    foreach($places as $place){
        if($place_id == $place->id ){
            $location = \App\Models\Location::where('location_id',$place->location)->first()->location_title;
            ob_start();
            ?>
            <tr>
                <td><?php echo $place->place ?></td>
                <td><?php echo $location ; ?></td>
            </tr>
            <?php

            return ob_get_clean();

        }
    }

}

 function getDownload($file,$filename)
{
    //PDF file is stored under project/public/download/info.pdf


    $headers = array(
              'Content-Type: application/pdf',
            );

    return Response::download($file, 'filename.pdf', $headers);
}
?>


