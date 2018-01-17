!function () {
    var Messages = function () {
        //service selectors
        this.$body = $('body');
        this.$btnDelete = $('.delete-message');
        this.$messages = $(".messages");

        //формируем объект карточек/стикеров по коллекциям
        this.$body.on('click', '.delete-message', $.proxy(function (e) {
            var current = $(e.target);
            var id = current.attr('data-id');
            if (confirm("Вы уверены что хотите удалить сообщение?")) {
                NProgress.start();
                NProgress.configure({ease: 'ease', speed: 3});
                $.ajax({
                    method: "POST",
                    url: "/message/destroy",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $(".messages").html(data);
                        NProgress.done();
                    }
                })
            }

        }, this));

        this.$body.on('click', '.change-message-btn', $.proxy(function (e) {
            var current = $(e.target);
            var id = current.attr('data-id');
            NProgress.start();
            NProgress.configure({ease: 'ease', speed: 3});
            $.ajax({
                method: "POST",
                url: "/message/update-form",
                data: {
                    id: id
                },
                success: function (data) {
                    $('.modal-body').html(data);
                    NProgress.done();
                }
            })
        }, this));

        this.$body.on('click', '.update-message', $.proxy(function (e) {
            var textarea = $('#messageText');
            var id = textarea.attr('data-id');
            var text = textarea.val();
            $.ajax({
                method: "POST",
                url: "/message/update",
                data: {
                    id: id,
                    text: text
                },
                success: function (data) {
                    $(".messages").html(data);
                    $('#updateModal').modal('toggle');
                }
            })
        }, this));
    };

    Messages.prototype = {
        init: function () {

        }
    };

    var messages = new Messages();

    $(document).ready(function () {
        messages.init();
    });
    window.messages = messages;
}();