<!-- Главная -->
<?php if ($url == 'main'){
echo ('    
    <button onclick="document.location='."'../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
    <button onclick="document.location='."'./profile'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
    <button onclick="document.location='."'./players'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
    <button onclick="document.location='."'./citys'".'"type="button" class="button buttfd list" style="margin-top:202px">Группы</button>
    <button onclick="document.location='."'../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
    </div>
 <div class="sett"></div>'
 );
 if($admin == 'admin'):
 
    echo ('<button onclick="document.location='."'/newsadd'".'" type="button" class="cityreg">Добавить новость</button>');
 
 echo ('<button onclick="document.location='."'./admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');

endif;
}

// Профиль
if ($url == 'profile'){
    echo ('    
        <button onclick="document.location='."'../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
        <button onclick="document.location='."'/'".'" type="button" class="button buttfd list" style="margin-top:62px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);"disabled>Мой Профиль</button>
        <button onclick="document.location='."'../players'".'" type="button" class="button buttfd list" style="margin-top:132px">Игроки</button>
        <button onclick="document.location='."'../citys'".'"type="button" class="button buttfd list" style="margin-top:202px">Группы</button>
        <button onclick="document.location='."'../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
        </div>
     <div class="sett"></div>'
     );
     if($admin == 'admin'):
     
     echo ('<button onclick="document.location='."'../admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
   
    endif; 
}
// игроки
if ($url == 'players'){
    echo ('    
        <button onclick="document.location='."'../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
        <button onclick="document.location='."'../profile'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
        <button onclick="document.location='."'../players'".'" type="button" class="button buttfd list" style="margin-top:132px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);"disabled>Игроки</button>
        <button onclick="document.location='."'../citys'".'"type="button" class="button buttfd list" style="margin-top:202px">Группы</button>
        <button onclick="document.location='."'../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
        </div>
     <div class="sett"></div>'
     );
     if($admin == 'admin'):
     
     echo ('<button onclick="document.location='."'../admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
   
    endif; 
}
if ($url == 'player_profile'){
    echo ('    
        <button onclick="document.location='."'../../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
        <button onclick="document.location='."'../../profile'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
        <button onclick="document.location='."'../../players'".'" type="button" class="button buttfd list" style="margin-top:132px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Игроки</button>
        <button onclick="document.location='."'../../citys'".'"type="button" class="button buttfd list" style="margin-top:202px">Группы</button>
        <button onclick="document.location='."'../../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
        </div>
     <div class="sett"></div>'
     );
     if($admin == 'admin'):
     
     echo ('<button onclick="document.location='."'../../admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
   
    endif; 
}
if ($url == 'city'){
    echo ('    
        <button onclick="document.location='."'../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
        <button onclick="document.location='."'../profile'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
        <button onclick="document.location='."'../players'".'" type="button" class="button buttfd list" style="margin-top:132px;">Игроки</button>
        <button onclick="document.location='."'../citys'".'"type="button" class="button buttfd list" style="margin-top:202px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);" disabled>Группы</button>
        <button onclick="document.location='."'../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
        </div>
     <div class="sett"></div>'
     );
    //  if ($sutu  == 0){
    //     echo ('<button onclick="onclick="newcity.showModal();" type="button" class="cityreg">Создать город</button>');
    //  }
    //  elseif($sutu == 1 ){
    //     echo ('<button onclick="editcity.showModal();" type="button" class="cityreg">Управление городом</button>');
    //  }
    //  elseif($sutu == 2){
    //     echo ('<button onclick="editcityuser.showModal();" type="button" class="cityreg">Управление городом</button>');
    //  }
     if($admin == 'admin'):
     
     echo ('<button onclick="document.location='."'../admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
   
    endif; 
}
if ($url == 'syty_profile'){
    echo ('    
        <button onclick="document.location='."'../../'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
        <button onclick="document.location='."'../../profile'".'" type="button" class="button buttfd list" style="margin-top:62px;">Мой Профиль</button>
        <button onclick="document.location='."'../../players'".'" type="button" class="button buttfd list" style="margin-top:132px;">Игроки</button>
        <button onclick="document.location='."'../../citys'".'"type="button" class="button buttfd list" style="margin-top:202px;  background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Группы</button>
        <button onclick="document.location='."'../../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
        </div>
     <div class="sett"></div>'
     );
     if($admin == 'admin'):
     
     echo ('<button onclick="document.location='."'../../admin'".'" type="button" class="button buttfd list" style="margin-top:272px">Админ</button>');
   
    endif; 
}
if($url == 'admin'){
   echo ('<button onclick="document.location='."'../admin'".'" type="button" class="button buttfd list" style="margin-top:272px; background-color: rgba(146, 146, 146, 0.199); color:rgb(226, 226, 226);">Админ</button>
   <button onclick="document.location='."'../../main'".'" type="button" class="button buttfd" style="margin-top:-250px"><span style="color:aqua">False</span><span style="color:#FF4500"> Danger</span></button>
   <button onclick="document.location='."'../profile'".'" type="button" class="button buttfd list" style="margin-top:62px">Мой Профиль</button>
   <button onclick="document.location='."'../players'".'" type="button" class="button buttfd list" style="margin-top:132px;">Игроки</button>
   <button onclick="document.location='."'../citys'".'" type="button" class="button buttfd list" style="margin-top:202px">Группы</button>
   <button onclick="document.location='."'../../../logout'".'" type="button" class="button buttfd list" style="margin-top:647px">Выйти</button>
</div>
<div>');
}