document.addEventListener("DOMContentLoaded", ()=>{

    let btn = document.querySelector('#lookup');  

    btn.addEventListener('click', ()=>{
        console.log("Lookup button clicked");     

        let entry = document.querySelector('#country').value;

         const params = new URLSearchParams({country: entry});

         const url = `http://localhost/info2180-lab5/world.php?${params.toString()}`;

         let stateObj = {id:"100"};
         window.history.pushState(stateObj, "Country Query", url);


         fetch(url, {method: 'GET'})
             .then(response => {
                 console.log(response);
                     if (response.ok) {
                         return response.text()
                     } else {
                         return Promise.reject("Something went wrong")
                     }
             })
             .then(data => {
                     let results = document.querySelector('#result');
                     results.innerHTML = data;       
             })
             .catch(error => console.log(error));

})
})