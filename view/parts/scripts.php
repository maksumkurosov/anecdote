<script src="/view/assets/js/jquery-3.3.1.min.js"></script>
<script src="/view/assets/js/popper.min.js" type="script"></script>
<script src="/view/assets/js/bootstrap/bootstrap.js" type="script"></script>
<script src="/view/assets/js/bootstrap/bootstrap.bundle.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="/view/vendor/jquery/jquery.min.js"></script>
<script src="/view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="/view/assets/js/clean-blog.min.js"></script>

<script type="text/javascript" charset="utf8" src="/view/assets/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#table_test').DataTable();
    } );
</script>
<script>
    $(document).ready(function() {
        $('span#like').click(function(){
            console.log($(this));
            setVote('like', $(this));
        });
    });

    // type - тип голоса. Лайк или дизлайк
    // element - кнопка, по которой кликнули
    function setVote(type, element){
        // получение данных из полей
        var user_id = $('#user_id').val();
        // var anecdote_id = this. $('#anecdote_id').val();
        var anecdote_id = element.parent().data('id');
console.log (user_id);
console.log (anecdote_id);
        $.ajax({
            // метод отправки
            type: "POST",
            // путь до скрипта-обработчика
            url: "view/likes.php",
            // какие данные будут переданы
            data: {
                'user_id': user_id,
                'anecdote_id': anecdote_id,
                'type': type
            },
            // тип передачи данных
            dataType: "json",
            // действие, при ответе с сервера
            success: function(data){
                // в случае, когда пришло success. Отработало без ошибок
                if(data.result == 'success'){
                    // Выводим сообщение
                    // alert('Голос засчитан');
                    // увеличим визуальный счетчик
                    var count = parseInt(element.find('b').html());
                    element.find('b').html(count+1);
                }else if(data.result == 'dislike'){
                    // Выводим сообщение
                    // alert('Голос засчитан');
                    // увеличим визуальный счетчик
                    var count = parseInt(element.find('b').html());
                    element.find('b').html(count-1);
                } else{
                    // вывод сообщения об ошибке
                    alert(data.msg);
                }
            }
        });
    }
</script>
<!-- Працюючий ajax like-->
<!--<script>-->
<!--    $(document).ready(function() {-->
<!--        $(".like").bind("click", function() {-->
<!--            var link = $(this);-->
<!--            var id = link.data('id');-->
<!--            $.ajax({-->
<!--                url: "view/like.php",-->
<!--                type: "POST",-->
<!--                data: {id:id}, // Передаем ID нашей статьи-->
<!--                dataType: "json",-->
<!--                success: function(result) {-->
<!--                    if (!result.error){ //если на сервере не произойло ошибки то обновляем количество лайков на странице-->
<!--                        link.addClass('active'); // помечаем лайк как "понравившийся"-->
<!--                        $('.counter',link).html(result.count);-->
<!--                    }else{-->
<!--                        alert(result.message);-->
<!--                    }-->
<!--                }-->
<!--            });-->
<!--        });-->
<!--    });-->
<!--</script>-->
<!--//-------------------------------->
<!--<script>-->
<!--    $('.select-categories li').click(function(){-->
<!--        var cat_id = $(this).attr("data-id");-->
<!---->
<!--        $.ajax({-->
<!--            type: "POST",-->
<!--            url: "ajax.php",-->
<!--            //dataType: "json",-->
<!--            data: {-->
<!--                category_id : cat_id-->
<!--            },-->
<!--            success: function (res) {-->
<!---->
<!--                if ($('.sub-category')) {-->
<!--                    $('.sub-category').remove();-->
<!--                    $('.row.categories').append(res);-->
<!--                } else {-->
<!--                    $('.row.categories').append(res);-->
<!--                }-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>

</html>