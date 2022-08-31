$(document).ready(function(){
    $.ajax({
        url: 'http://127.0.0.1:8000/api/posts',
        type: "GET",
        dataType: "json",
        success: function (data){
        RenderPosts(data);
        }
    });
    $.ajax({
        url: 'http://127.0.0.1:8000/api/genres',
        type: "GET",
        dataType: "json",
        success: function (data){
        RenderGenres(data);
        }
    });
    $.ajax({
        url: 'http://127.0.0.1:8000/api/audios',
        type: "GET",
        dataType: "json",
        success: function (data){
        RenderAudios(data);
        }
    });
});

function RenderGenres(genres){
    
    genres.forEach(element => {
        $(".genre_geter").append(`
        <div class="renderedGenre">
        <h7 class="g_user">Genre id : ${element.id}</h6>
        <h7 class="g_user">name : ${element.name}</h3>
    </div>`)
    });
    }

    function RenderAudios(genres){
    
        genres.forEach(element => {
            $(".audio_geter").append(`
            <div class="renderedGenre">
            <h7 class="g_user">Audio path : ${element.audioPath}</h6>
            <h7 class="g_user">id : ${element.id}</h3>
        </div>`)
        });
        }

function RenderPosts(posts){
  
$("#renderedPost").remove();
posts.forEach(element => {
    if(element.audio.genre != null){
    $(".post_geter").append(`
    <div class="renderedPost">
    <h6 class="g_user">User id : ${element.user_id}</h6>
    <h3>${element.name}</h3>
    <h3>Путь к файлу : (${element.audio.audioPath})</h3>
    <audio controls>
  <source src="http://127.0.0.1:8000/uploads/${element.audio.audioPath}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
    <h3 class="g_tags">Тэги: <b class="g_tags_b">Темп : ${element.audio.tempo} Жанр : ${element.audio.genre.name}</b></h3>
    <h5>Описание : ${element.text}</h5>
</div>`)
    }
});
    }
    
    $("#b_p_send").click(function(){
          $.ajax({
            type:'post',
            url:'http://127.0.0.1:8000/api/post',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify({
                "name":$("#p_name").val(),
                "text":$("#p_text").val(),
                "user_id":$("#p_user_id").val(),
                "audio_id":$("#p_audio_id").val()
            }),
            success: function(data){
                console.log(data);
            },   
        });
    });


    $("#b_a_send").click(function(){

        var formData = new FormData();
        formData.append('audio', $("#a_Path")[0].files[0]);
        formData.append('tempo', $("#a_tempo").val());
        formData.append('genre_id', $("#a_genre").val());
        formData.append('post_id', 1);

        // $("#auau").append($("#a_Path").val());
        $.ajax({
          type:'post',
          url:'http://127.0.0.1:8000/api/audio',
          // contentType: "application/json; charset=utf-8",
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
          dataType: "json",
          data: formData,
          success: function(data){
              console.log(data);
          },   
      });
  });

    $("#b_p_creater").click(function(){
        $(".post_creater").toggleClass("active");
    });

    $("#b_a_creater").click(function(){
        $(".audio_creater").toggleClass("active");
    });
