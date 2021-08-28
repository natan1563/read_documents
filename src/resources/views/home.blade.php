<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{assets()}}"> --}}
    <title>Read Documents</title>

    <style>
        .mainBox {
            height: 100vh;
        }
    </style>
</head>
<body>

    <div id="app" class="container mainBox border border-secondary">

        <div class="row mt-5 text-center">
            <h1>Lista de noticias</h1>
        </div>

        <div class="row mt-5 row-cols-1 row-cols-md-1 g-4 border border-primary py-2">
            <div class="col">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">Titulo</h5>
                  <small>Subtitulo</small>
                  <p>Fonte</p>
                  <p>Conteudo</p>
                  <p>Data da publicação</p>
                  <a class="btn btn-info" href="https://www.google.com">Acesse</a>
                </div>
              </div>
            </div>
        </div>
        <p v-model="dataNotices"></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>

        const NovasNoticias = {
            name: 'NovasNoticias',
            props: {
                dataNotices: {
                    type: Object,
                    default: {}
                }
            },
            template: `<p>Teste </p>`
        };

        const vm = new Vue({
            el: '#app',
            data: {
                dataNotices: 'teste',
                responseError: false
            },
            components: {
                NovasNoticias
            },
            methods: {
                getNotices() {
                    fetch("http://localhost:8000/api/noticias/")
                    .then(response => response.json())
                    .then(jsonResponse => {
                        this.dataNotices = jsonResponse;
                    })
                    .catch(error => responseError = true);
                }
            },
            created() {

            },
        });

    </script>
</body>
</html>
