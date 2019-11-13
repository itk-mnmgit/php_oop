//HTMLの読み込みが終われば中身を実行
$(function(){

    $('#add-button').on('click', function(e){

    //formタグの送信を無効化する(Ajaxとformの二重投稿を防ぐ)
        e.preventDefault();

    //入力されたタスク名を取得
        let taskName = $('#input-task').val();

    //ajax開始
        $.ajax({
        //キー : 値
            url : 'create.php',
            type : 'POST',
            dataType : 'json',
            data : {
            //送信する値を書きこむ
                task : taskName
            }

        }).done((data) =>{
            // $('tbody').append(`<p>${data["name"]}<?p>`);
            console.log(data);

            $('tbody').append(
                `<tr class = ${data['id']}>` +
                    `<td>${data['name']}</td>` +
                    `<td>${data['update_at']}</td>` +
                    '<td class = .status- + ' + $task['id'] + '></td>' +
                    `<td>` +
                        `<a class="text-success" href="edit.php?id=${data['id']}">EDIT</a>` +
                    `</td>` +
                    `<td>` +
                        `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php?id=${data['id']}">DELETE</a>` +
                    `</td>` +
                    `<td>` +
                        `<button class="btn done-button btn-ml .btn-status-<?php echo $task['id']; ?>" data-id="<?php echo $task['id']; ?>">` +
                        `<i class="fas fa-check-square"></i>` +
                        `</button>`+
                    `</td>` +

                `</tr>`
            );

            //ADDした後入力欄リセット
            $('#input-task').val('');

        }).fail((error) =>{
            console.log(error);
        })
   });

    //削除のボタンがクリックされた時の処理

    //HTMLが読みこまれた時点の画面に対しての処理
    //$('.delete-button').on('click', function(e){
    //document全体に対しての処理
    $(document).on('click', '.delete-button', function(e){
    //    alert ('delete 押したな！');
       e.preventDefault();

    //削除対象のIDを取得
      //$(this)...今イベントが実行されている本体
        //今回はクリックされたaタグ本体
        let selectedId = $(this).data('id');
        // alert(selectedId);

        //ajax開始
        $.ajax({
            //キー : 値
                url : 'delete.php',
                type : 'GET',
                dataType : 'json',
                data : {
                //送信する値を書きこむ
                    id : selectedId
                }

            }).done((data) =>{
            //帰ってきたIDと同じクラス名の<tr>を削除
                $(`.${data}`).fadeOut(1000);

            }).fail((error) =>{
                console.log(error);
            })

   });

   $(document).on('click', '.done-button', function(){
    let selectedId = $(this).data('id');

    $.ajax({
        url : 'done.php',
        type : 'GET',
        dataType : 'json',
        data : {
            id : selectedId
        }

    }).done( (data) => {
        // $(this).fadeIn(1000, function() {
            $(this).removeClass('done-button');
            $(this).addClass('undone-button');
            $('.btn-status-' + data).html('<i class="far fa-check-square"></i>');
            $('.status-' + data).text('DONE');
        // });

    }).fail( (error) =>{
        console.log(error)
    })
   });

   $(document).on('click', '.undone-button', function(){
    let selectedId = $(this).data('id');

    $.ajax({
        url : 'undone.php',
        type : 'GET',
        dataType : 'json',
        data : {
            id : selectedId
        }

    }).done( (data) => {

        // $(this).fadeIn(1000, function() {
            $(this).removeClass('undone-button');
            $(this).addClass('done-button');
            $('.btn-status-' + data).html('<i class="fas fa-check-square"></i>');
            $('.status-' + data).text('NOT YET');
        // });

    }).fail( (error) =>{
        console.log(error)
    })
   });

});