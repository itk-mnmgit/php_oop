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
                `<tr>` +
                    `<td>${data['name']}</td>` +
                    `<td>${data['update_at']}</td>` +
                    `<td>?</td>` +
                    `<td>` +
                        `<a class="text-success" href="edit.php?id=${data['id']}">EDIT</a>` +
                    `</td>` +
                    `<td>` +
                        `<a data-id="${data['id']}" class="text-danger delete-button" href="delete.php?id=${data['id']}">DELETE</a>` +
                    `</td>` +
                `</tr>`
            );

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
                console.log(data);

            }).fail((error) =>{
                console.log(error);
            })

   });

});