window.Echo.channel('laravel_database_private-order-created')
    .listen('OrderCreated', (e) => {
        console.log(e)
        //Bus.$emit('post.created', e.post)

        //Vue.$vToastify.success(`Título do post ${e.post.name}`, 'Novo Post')
    })
