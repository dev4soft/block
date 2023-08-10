<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/minimal_bs.css" rel="stylesheet" type="text/css">
    <title>Каталог</title>
</head>
<body>
<div id="app">
    {{ message }}
</div>

<script src="js/vue.min.js"></script>
<script src="js/vue-resource.min.js"></script>

<script>
    Vue.use(VueResource);
    var app = new Vue({
        el: '#app',
        data: {
            message: 'hello vue',
        },

        computed: {
        },

        watch: {
        },

        methods: {
        },

        created: function() {
        },
    })
</script>
</body>
</html>
