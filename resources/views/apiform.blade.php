@extends('layout')

@section('content')
<style>
    .hide{
        display: none;
    }
</style>
<section class="content-wrapper" style="margin-left: 150px;">
    <section class="wrapper" style="padding-right: 20px;padding-top: 50px;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div id="msg-error" class="alert alert-danger hide"></div>
                </div>
            </div>
        </div>

        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Форма API</h3>
            </div>

            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                @foreach($lists as $list)
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio"
                                               data-method="{{$list['data']}}" data-id="{{$list['id']}}"
                                               id="rd{{$list['id']}}" name="customRadio"
                                        @if($list['id'] === 1)
                                            checked = ""
                                        @endif>
                                        <label for="rd{{$list['id']}}" class="custom-control-label">{{$list['title']}}</label>
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group hide" id="msg-uuid" style="margin-top: 10px;">
                                <input type="text" name="uuid" class="form-control" placeholder="Введите ID...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
</section>

@endsection

<script>
    window.onload = function(){
      let frm = document.querySelector('form');
/*
* ловим события на форме
*/
      frm.addEventListener('click', (ev)=>{
        let elem = ev.target;
        let msg = document.getElementById('msg-uuid');

        if(elem.type === 'submit'){
          ev.preventDefault();
          let data_rd = getStatusRadio();
/*
* асинхронная ф-ция sendData для отправки запроса к контролеру
* UUIDApiController по маршрутам указанных в api.php
* параметры (url, data) будут получены из ф-ции getStatusRadio()
*/
          async function sendData(url, data) {
            let opt = {
              method: data.method,
              mode: "cors",
              cache: "no-cache",
              headers: {
                "Content-type": "application/json"
              },
            };

            if(data.method.toUpperCase() !== "get".toUpperCase()){
              opt.body = data.body || "";
            }
            const res = await fetch(url, opt);
            return await res.json();
          }

          sendData(data_rd.url, data_rd).then((data) => {
            // console.log('DATA AJAX:', data);
            if(data.status === 'ok'){
              if(data_rd.method === 'post'){
                window.location.href = '/?id='+data.uuid.id + '&msg='+data.msg + '&status=' + data.status;
              }else {
                if(data_rd.method === 'delete'){
                  window.location.href = '/?status='+data.status + '&msg=' + data.msg + '&method=del';
                }else {
                  window.location.href = '/?status='+data.status + '&msg=' + data.msg;
                }

              }
            }else{
                let msg_err = document.getElementById('msg-error');
                msg_err.innerHTML = `<p>${data.msg}</p>`;
                msg_err.classList.remove('hide');
                setTimeout(function () {
                    msg_err.classList.add('hide');
                }, 2000);
            }
          })
        }

        if(elem.id !== "rd1" && elem.id !== "rd2" && elem.id !== "rd3" && elem.id !== "rd4") return;
        if(elem.id === "rd3" || elem.id === "rd4"){
          if(msg.classList.contains('hide')){
            msg.classList.remove('hide');
          }
        }else {
          msg.classList.add('hide');
        }
      });

/*
функция возвращает объект, проверки радио кнопок на форме
какой сделан выбор, {method: '', url: '', id: '', body: ''}
*/
      function getStatusRadio() {
        let radios = document.querySelectorAll('[type=radio]');
        // console.log('radios ', radios);
        let data = {
          method: 'get',
          url: "/api/uuid",
        };
        radios.forEach((item) => {
          if(item.checked){
            data.method = item.dataset.method;
            if(item.dataset.id > 1){
              const frmData = new FormData();
              let inp = document.querySelector('#msg-uuid > input');
              let value = inp.value;
              frmData.append("uuid", value);
              data.id = value;
              if(value) data.url = data.url + "/" + value;
              data.body = frmData;
            }
          }
        });

        return data;
      }
    };

</script>
