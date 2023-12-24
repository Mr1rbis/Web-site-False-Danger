window.addEventListener("resize", AutoScale); //Масштабируем страницу при растягивании окна

AutoScale(); //Масштабируем страницу после загрузки

function AutoScale()
{
    let width = window.innerWidth; //Ширина окна
    //Если вы хотите проверять по размеру экрана, то вам нужно свойство window.screen.width

    if(width >= 1080)
    {
   	 ChangeScale("big-main");
    }
    else if(width < 1080 && width > 720)
    {
   	 ChangeScale("normal-main");
    }
    else if(width < 720)
    {
   	 ChangeScale("small-main");
    }
}