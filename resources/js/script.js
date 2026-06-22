function toggleMenu(menuId)
{
    let menu = document.getElementById(menuId);

    if(menu.style.display === "block")
    {
        menu.style.display = "none";
    }
    else
    {
        menu.style.display = "block";
    }
}