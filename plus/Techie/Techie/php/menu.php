<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Menu de navigation dynamique en php et css</title>
<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
<script>
//declaration des variables contenant les coordonnées de la souris
var x =  0;
var y =  0;

//fonction de recupération des coordonnées de la souris
function position(e) {
x = (navigator.appName.substring(0,3) == "Net") ? e.pageX : event.x+document.body.scrollLeft;
y = (navigator.appName.substring(0,3) == "Net") ? e.pageY : event.y+document.body.scrollTop;
//window.status = "Souris x:"+x+" | y:"+y;
}

//gestion de l'evenement 'mouvemove' en fonction du navigateur
if (navigator.appName.substring(0,3) == "Net") document.captureEvents(Event.MOUSEMOVE);
document.onmousemove = position;

//fonction d'affichage du sous-menu
function disp_menu(mnuidx)
{
    window.parent.showpos(x+20,y+25,mnuidx);
}

</script>

<body leftmargin="0" topmargin="0" scroll="no">
    <table cellpadding="0" cellspacing="0">
        <tr>
    <?php
        include("pdo/configPDO.php");
        $type_mnu = 1;
        $parent_idx = 0;
        
        //$MenuQuery = mssql_init("Rqt_Menu",$Conn);
        //mssql_bind($MenuQuery,"@User_Idx",&$num_session,SQLINT4);
        //mssql_bind($MenuQuery,"@Type_Mnu",&$type_mnu,SQLINT4);
        //mssql_bind($MenuQuery,"@Menu_Parentidx",&$parent_idx,SQLINT4);
        //return values
        
$sql = "SELECT id, nom, url FROM menu";

        $MenuQuery = "select * from menu, users_rights ";
        $MenuQuery = $MenuQuery."where menu.right_idx = users_rights.right_idx ";
        $MenuQuery = $MenuQuery."and users_rights.user_idx = 1 "; // où un est le numéro de l'utilisateur en cours (a vous de le trouver dans la base user...)
        $MenuQuery = $MenuQuery."and menu_type = ".$type_mnu;
        
        $ResMenu = mysql_query($MenuQuery,$sql);
        /*
            chargement du menu principal
        */
            
            
        while($TabMenu = mysql_fetch_array($ResMenu))
        {
            $menu_idx = $TabMenu[0];    //code interne du menu
            $menu_dsc = $TabMenu[2];    //description du menu
            $menu_url = $TabMenu[3];    //page de liens
            $menu_target = $TabMenu[4];    //target du liens
            $menu_submenu = $TabMenu[10];    //definis le champs sous-menu (1=vrai,0=faux)

            //si pas de sous menu, alors pas d'evenement 'onclick'
            if($menu_submenu!=0){
                ?>
                <td class='menu_gauche_title' onclick="disp_menu(<? echo $menu_idx; ?>);" style="cursor: hand;">
                    <? echo $menu_dsc; ?>
                </td>
                <?php
            }
            else
            {
                ?>
                <td class='menu_gauche_title' style="cursor: hand;">
                    <a href="<? echo $menu_url; ?>" target="<? echo $menu_target; ?>" ><? echo $menu_dsc; ?></a>
                </td>
                <?php
            }
            ?>
            <td class='menu_gauche_title' onclick="disp_menu(<? echo $menu_idx; ?>);">
                
            </td>
            <?php
        }
    ?>
        </tr>
    </table>

</body>

</html>