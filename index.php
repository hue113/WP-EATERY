<!DOCTYPE html>
<html>

<?php 
    include 'header.php';?>


                        <?php include 'Menuitem.php';

                        $menuItems =array();
                        $i=0;
                        $stars = '*';
                        while ($i < 6){
                            $e=$i+1;
                            $menuName=$i%2==0?"The WP Burger ":"WP Kebabs ";
                            $menuDescription=$i%2==0?"Freshly made all-beef patty served up with homefries":"Tender cuts of beef and chicken, served with your choice of side";
                            $menuPrice = $i%2 ==0?"$14":"$17";
                            $RepeatStars=str_repeat($stars , $e).$e;
                            $newMenuItems=new Menuitem($menuName.$RepeatStars, $menuDescription, $menuPrice);
                            array_push( $menuItems,$newMenuItems );

                            $i++;
                        }

                        foreach( $menuItems as $menuItem){
                        }

                        ?>
                        
                <div id="content" class="clearfix">
                <aside>

                            <h2> <?php $date = getdate(); echo $date['weekday']."'s Specials" ?></h2>
                            <hr>
                        <?php
                                     foreach($menuItems as $menuItem){
                                         $imgSrc=strpos($menuItem->get_itemName(), "Burger")?"images/burger_small.jpg":"images/kebobs.jpg";
                                         $artStr=strpos($menuItem->get_itemName(), "Burger")?"Burger":"Kebobs";
                                         echo("<img src=\"".$imgSrc."\" alt=\"".$artStr."\" title=\"".$menuItem->get_itemName()."\">");
                                         echo(" <h3>".$menuItem->get_itemName()."</h3> <p>".$menuItem->get_description()." - ".$menuItem->get_price()."</p>");
                                        }
                        ?>

                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->

            <?php include 'footer.php';?>

            <!-- End Wrapper  this dv is included in footer.php-->
    </body>
</html>
