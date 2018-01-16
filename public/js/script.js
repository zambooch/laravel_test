!function () {
    var Messages = function () {
        //service selectors
        this.$body = $('body');
        this.$btnDelete = $('#deleteMessage');

        //формируем объект карточек/стикеров по коллекциям
        this.$btnDelete.on('click', $.proxy(function (e) {
            var current = $(e.target);
            var id = current.attr('data-id');
            if (confirm("Вы уверены что хотите удалить сообщение?")) {
                $.ajax({
                    method: "POST",
                    url: "/message/destroy",
                    data: {
                        id: id
                    },
                    success: function (data) {
                        $(".sel_preview_wrapper").html(data);
                    }
                })
            }

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