<header class="masthead" style="background-image: url('/view/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Запропонувати анекдот</h1>
                    <span class="subheading">Після перевірки анекдотів, ми опублікуємо кращі з них</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container col-sm-4" >
    <form method="post">
        <script>
            $(document).ready(function(){
                $("#department").val("${requestScope.selectedDepartment}").attr('selected', 'selected');
            });
        </script>

        <div class="form-group">
            <label for="formGroupExampleInput">Тема</label>
<!--            <input type="text" name="title" class="form-control" id="formGroupExampleInput">-->
            <select id="department" name="them">
                <c:forEach var="item" items="${dept}">
                    <option value="Them 1">Тема 1</option>
                    <option value="Them 2">Тема 2</option>
                    <option value="Them 3">Тема 3</option>
                    <option value="Them 4">Тема 4</option>
                </c:forEach>
            </select>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Заголовок</label>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Анекдот</label>
            <textarea class="form-control" name="anecdote" id="formGroupExampleInput"></textarea>
        </div>
        <input type="submit" name="form_anecdote" class="btn btn-primary" value="Додати">
    </form>
</div>