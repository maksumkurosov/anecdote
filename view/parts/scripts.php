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