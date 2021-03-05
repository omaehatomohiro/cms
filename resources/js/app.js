/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios = require('axios');

import "@fortawesome/fontawesome-free/css/all.css";
// import "@fortawesome/fontawesome-free/js/brands";
// import "@fortawesome/fontawesome-free/js/solid";
// import "@fortawesome/fontawesome-free/js/regular";


window.Vue = require('vue');

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


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});




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