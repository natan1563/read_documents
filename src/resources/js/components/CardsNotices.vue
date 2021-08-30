<template>
     <div>
         <div
            v-for="{id, conteudo, subtitulo, fonte, titulo, data_publicacao, url} in dataNotices"
            :key="id"
            class="row mt-5 row-cols-1 row-cols-md-1 g-4 container-fluid">
            <div class="col">
              <div class="card h-100">
                <div class="card-body">
                  <div class="border-bottom border-secondary">
                      <h5 class="card-title">{{ titulo }}</h5>
                      <small>{{ subtitulo }}</small>
                  </div>
                  <p class="mt-3">{{ fonte }}</p>
                  <p class="text-justify">{{ conteudo }}</p>
                  <p><strong>Data da publicação: </strong>{{ data_publicacao | formatingDate}}</p>
                  <a class="btn btn-md btn-info" :href="url" target="_blank">Site da publicação</a>
                </div>
              </div>
            </div>
        </div>
     </div>
</template>

<script>
    export default {
        data() {
            return {
                dataNotices: []
            }
        },
        mounted() {
            this.getNotices();
        },
        filters: {
            formatingDate(timesTampDate) {
                let checkNumber = (date) => {
                    if (date.toString().length == 1) return "0" + date;
                    return date;
                }
                const date      = new Date(timesTampDate);
                const day       = checkNumber(date.getDate());
                const month     = checkNumber(date.getMonth());
                const year      = checkNumber(date.getFullYear());
                const hour      = checkNumber(date.getHours());
                const minutes   = checkNumber(date.getMinutes());
                const seconds   = checkNumber(date.getSeconds());

                return `${day}/${month}/${year} ${hour}:${minutes}:${seconds}`;
            }
        },
        methods: {
            getNotices() {
                axios.get('/api/noticias/')
                .then(response => this.dataNotices = response.data)
                .catch(error => console.log(error))
            },
        },
    }
</script>
