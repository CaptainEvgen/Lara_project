function fetchSearchForm(form, url, message, token){
    f.addEventListener('submit',function(event){
        event.preventDefault();

        let formData = new FormData(form);
        let fetchData = {
            method: 'post',
            body: formData,
            headers: {
                "Accept":"application/json"
            },
        }
        fetch(url, fetchData)
            .then(
                response => {
                    return response.json();
                }
            )
            .then(
                json => {
                    message.innerHTML = '';
                    for(let obj of json){
                        let route;
                        let id = obj['id'];
                        let name = obj['name'];
                        if(obj['location_name']){
                            route = '/restaurant/';
                        } else {
                            route = '/product/getOne/';
                        }
                        message.innerHTML +=('<div class="search-list__item"><a href="'+ route + id + '">'+ name +'</a></div>');
                    }
                }
            )
    });
}

function fetchSearchInput(input, url, mes){
    input.addEventListener('input',function(){
        let name = input.value;
        let formData = new FormData();
        formData.append('text', name);
        formData.append('_token', token);
        if(name.length > 0){
            fetch(url, {
                method: 'post',
                body: formData,
                headers: {
                    "Accept":"application/json"
                },
            })
                .then(
                    response => {
                        return response.json();
                    }
                )
                .then(
                    json => {
                        console.log(json);
                        mes.innerHTML = '';
                        for(let obj of json){
                            let route;
                            let id = obj['id'];
                            let name = obj['name'];
                            if(obj['location_name']){
                                route = '/restaurant/';
                            } else {
                                route = '/product/getOne/';
                            }
                            mes.innerHTML +=('<div class="search-list__item"><a href="'+ route + id + '">'+ name +'</a></div>');
                        }
                    }
                )
            } else {
                mes.innerHTML = '';
            }
    });
}

function fetchSendForm(form, url, message, text = ''){
    form.addEventListener('submit',function(event){
        event.preventDefault();
        let button = form.querySelector('[type = "submit"]');
        button.setAttribute('disabled', 'disabled');
        console.log(button);
        let formData = new FormData(form);
        let fetchData = {
            method: 'POST',
            body: formData,
            headers: {
                "Accept":"application/json"
            },
        }

        fetch(url, fetchData)
            .then(
                response => {
                    if(!response.ok){
                        response.json()
                            .then(
                                result => {
                                    let errors = result.errors;
                                    for (let err in errors){
                                        message.classList.add('alert');
                                        message.classList.add('alert-danger');
                                        message.innerHTML = errors[err];
                                    }
                                }
                            )
                    }else{

                        message.innerHTML = '';
                        message.classList.remove('alert');
                        message.classList.remove('alert-danger');
                        let messageText = document.querySelector('.message-block__text');
                        messageText.parentNode.classList.add('alert-success');
                        messageText.parentNode.parentNode.classList.remove('hidden');
                        messageText.innerHTML = text;
                    }
                    button.removeAttribute('disabled');
                },

            )
    });
}
