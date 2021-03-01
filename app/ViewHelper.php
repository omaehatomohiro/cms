<?php

function category_options($categories,$post){
  $opstions_html = "<option value=''>選択なし</option>";
  
  if( !is_null($post) ){
    $selected_id = $post->category_id;
  }else{
    $selected_id = '';
  }
  foreach($categories as $category){
    if($category->id == $selected_id){
      $opstions_html .= '<option value="' . $category->id . '" selected>' . $category->name .'</option>';
    }else{
      $opstions_html .= '<option value="' . $category->id . '">' . $category->name .'</option>';
    }
  }
  return $opstions_html;
}



function status_options($num){
  $options = [ 1 => '公開', 0 => '非公開'];
  foreach($options as $key => $value){
    $selected = (intval($num) == $key) ? ' selected': '';
    echo '<option value="' . $key . '"' . $selected .'>' . $value . '</option>';
  }
}


function tag_checks($tags, $post){
  
  $tagCheckboxs = '';
  $tagFlag  = false;
  $tagArray = [];

  if( !is_null($post) ){
    $selected_tags = $post->tags; // 空でもobjectが返される
    if(isset($selected_tags[0])){
      foreach($selected_tags as $tagObj ){
        array_push($tagArray,(int)$tagObj->id);
        $tagFlag = true;
      }
    }
  }

  foreach($tags as $tag){
    $tagCheckboxs .= '<div class="form-check form-check-inline">';
    $tagCheckboxs .= '<input name="selected_tags[]" class="form-check-input" type="checkbox" ';
    $tagCheckboxs .= 'id="' . $tag->slug . '" value="' . $tag->id . '" ';
    if( $tagFlag && in_array($tag->id,$tagArray,true) ){
      $tagCheckboxs .= 'checked="checked"';
    }
    $tagCheckboxs .= '><label class="form-check-label" for="' . $tag->slug . '">' . $tag->name . '</label></div>';
  }

  return $tagCheckboxs;
}