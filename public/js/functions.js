let editor;
window.onload= function(){
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        
        toolbar: {
            items: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList',
                '|',
                'indent',
                'outdent',
                '|',
                'imageUpload',
                'blockQuote',
                'insertTable',
                'mediaEmbed',
                'undo',
                'redo'
            ]
        },
        language: 'ja',
        config: {
            height:1000
        },
        image: {
            toolbar: [
                'imageTextAlternative',
                'imageStyle:full',
                'imageStyle:side'
            ]
        },
        table: {
            contentToolbar: [
                'tableColumn',
                'tableRow',
                'mergeTableCells'
            ]
        },
        licenseKey: '',
        ckfinder: {
            uploadUrl: '/api/upload/store'
        }
        
    } )
    .then( editor => {
        window.editor = editor;
        console.log(window.editor.config.width = 100);
    } )
    .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: 218txhfcywnk-8o65j7c6blw0' );
        console.error( error );
    } );

} //end windowload




document.getElementById('save-post').addEventListener('click', function() {
    console.log(window.editor.getData());
    var form = document.querySelector('#post-form');
    //e.preventDefault();
    var post_content = document.querySelector('input[name="post_content"]');

    //post_text.value = JSON.stringify(window.editor.getData());
    post_content.value = window.editor.getData();
    console.log(post_content);
    form.submit();
    return false;
});


document.getElementById('post_thumbnail').addEventListener('change',function(e){

    document.getElementById('post_thumb_image').src=e.value;
    var reader = new FileReader();
    reader.onload = function(e){
        create_thumbnail(e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});


function create_thumbnail(data){
    var img = document.createElement('img');
    img.className = "img-thumbnailimg-fluid img-fluid";
    img.src = data;
    var thumb_div = document.getElementById('post_thumb_image');
    if(thumb_div.childElementCount > 0){
        thumb_div.removeChild(thumb_div.firstElementChild);
    }
    thumb_div.appendChild(img);   
}