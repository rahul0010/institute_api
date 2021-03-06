
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

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
    el: '#app'
});

const input = document.getElementById('photo');
if(input)
{
    input.addEventListener('change', function(){
        var img = document.getElementById('resultImg');
        img.src = URL.createObjectURL(this.files[0]);
    });
}

const formSubmitData = document.getElementById('form');
if(formSubmitData)
{
    var div = document.getElementById('div');
    formSubmitData.addEventListener('submit', function(e)
    {
        document.getElementById('loading').style.display = "block";
        e.preventDefault();

        fetch(form.action, {
            method : 'POST',
            body: new FormData(form)
        })
        .then(response => {
            formSubmitData.reset();
            return response.text()
        })
        .then(response => {
            if(div){
                div.classList.remove("d-none");
            }
            else
            {
                formSubmitData.innerHTML = response + `<br><a href="${location.href}">Click here to add new record</a><br><a href="/">Click here</a> to go to home`;
            }
            var loading = document.getElementById('loading').style.display = "none";
        })
        .catch(error => console.error('Error: ',error))
    });
}
