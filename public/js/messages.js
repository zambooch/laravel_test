!function () {
    var Messages = function () {
        //service selectors
        this.$body = $('body');
        this.$btnDelete = $('.delete-message');
        this.$messages = $(".messages");

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


        this.$body.on('click', '.create-message', $.proxy(function (e) {
            this.hideErrors();
            var textarea = $('#message-text');
            var text = textarea.val();
            NProgress.start();
            NProgress.configure({ease: 'ease', speed: 3});
            $.ajax({
                method: "POST",
                url: "/message/store",
                data: {
                    text: text
                },
                success: function (data) {
                    $(".messages").html(data);
                    NProgress.done();
                    $('#create-form')[0].reset();
                },
                error: function (data) {
                    var errors = data.responseJSON;
                    var myAlert = $('.my-alert');
                    myAlert.css('display', 'block');
                    myAlert.text(errors.text[0]);
                    NProgress.done();
                }
            })
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
            this.hideErrors();
            var textarea = $('#messageText');
            var id = textarea.attr('data-id');
            var text = textarea.val();
            NProgress.start();
            NProgress.configure({ease: 'ease', speed: 3});
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
                    $('.modal-backdrop').removeClass('in');
                    NProgress.done();
                },
                error: function (data) {
                    $('#updateModal').modal('toggle');
                    $('.modal-backdrop').removeClass('in');
                    var errors = data.responseJSON;
                    var myAlert = $('.my-alert');
                    myAlert.css('display', 'block');
                    myAlert.text(errors.text[0]);
                    NProgress.done();
                }
            })
        }, this));

        this.hideErrors = function () {
            $('.my-alert').css('display', 'none');
        };
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