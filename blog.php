<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Website</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="512x512" href="favicon/android-chrome-512x512.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-chrome-192x192.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <!-- favicon ends -->

    
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital@1&family=Encode+Sans+SC:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

</head>

<body>
    <section class="sub-header">
        <nav>
            <a href="index.html"><img src="images/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="course.php">Course</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="contact.php">Contacts</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>Our Certificates & Online Programs for 2021</h1>
    </section>
    <!--   -----Blog Page Content--------  -->
    <section class="blog-content">
        <div class="row">
            <div class="blog-left">
                <img src="images/blogpage.jpg">
                <h2>Our Certificates & Programs for 2021</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nisi ex soluta delectus consequuntur sit omnis quod accusamus, voluptatum ipsum consequatur maiores eligendi fuga est corrupti recusandae nesciunt rem culpa numquam?
                Facilis, vitae quos. Distinctio quod vitae culpa aut quibusdam mollitia cupiditate rem sit aliquid illum incidunt enim quia vero asperiores exercitationem rerum reiciendis porro alias voluptas, ullam officia! Aspernatur, quam.
                Quaerat perspiciatis commodi laborum, temporibus itaque voluptatem porro, provident numquam possimus ipsum quae! Quasi soluta distinctio dignissimos beatae delectus minus sit, excepturi tempora recusandae numquam molestiae nostrum! Quo, accusantium sit.</p>
                <br>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, quidem possimus. Nihil dolore, blanditiis eaque totam illum, laborum aspernatur, at sint voluptates eius ullam cumque nesciunt saepe repellat recusandae itaque?
                Numquam atque accusantium fuga consequatur modi fugiat corrupti illum aspernatur dolorum, molestiae nulla alias tenetur quasi expedita excepturi consectetur dolore. Autem totam sequi saepe aliquam, ullam corporis cumque obcaecati temporibus.
                Libero voluptatum perfer Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni rem totam facere sunt exercitationem aliquid nobis ut, voluptatem asperiores, deleniti eius fugit enim officiis tempore perspiciatis consequatur sapiente perferendis. Dignissimos.
                endis, blanditiis Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum beatae recusandae quas ipsa eos inventore eum laborum cupiditate quasi voluptate, doloremque suscipit amet incidunt sed voluptatibus placeat numquam non omnis?
                Perspiciatis ad voluptatem quibusdam aperiam commodi natus similique obcaecati, iure iusto eius animi id deserunt laudantium error reprehenderit blanditiis quia distinctio repellat fugiat tempore vero ratione! Placeat iure voluptate hic! dolor, vel recusandae harum praesentium ducimus, quia ratione quo quos minima maiores autem! Deserunt, perferendis omnis quis veritatis impedit officiis perspiciatis fuga aliquam a nesciunt ipsam!</p>
                <br>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate nam soluta nisi illum ipsa hic totam dolorem velit, dolores minus libero fugit esse quisquam ea, accusamus, explicabo consectetur. Nesciunt, nulla! ipsum dolor sit amet consectetur adipisicing elit. Neque aspernatur eos cumque. Eius vitae libero nobis, cumque deleniti aperiam tempore repudiandae aspernatur nulla quam maxime, eveniet quo? Harum, alias sapiente.
                Quos ad inventore obcaecati perferendis libero, adipisci praesentium accusantium unde asperiores accusamus enim quasi numquam, tenetur rem. Voluptate, harum, vel corporis quo saepe, fugit facere ad deserunt quia perspiciatis quae!
                </p>
                <br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Similique, quo expedita laudantium praesentium atque autem quae placeat totam numquam sed laborum, eos facilis exercitationem. Labore unde praesentium nam vitae quis.</p>
            
                <div class="comment-box">
                    <h3>Leave a Comment</h3>
                    <form class="comment-form" method="post" id="blog">
                        <input type="text" name= "name1" placeholder="Enter Name">
                        <input type="email" name="email1" placeholder="Enter Email">
                        <textarea rows="5" name="comment" placeholder="Your Comment"></textarea>
                        <button type="submit" class="hero-btn about-btn">Post Comment</button>
                    </form>
                </div>
            
            
            
            
            </div>
            <div class="blog-right">
                <h3>Post Categories</h3>
                <div>
                    <span>Bussiness Analytics</span>
                    <span>21</span>
                </div>
                <div>
                    <span>Data Science</span>
                    <span>16</span>
                </div>
                <div>
                    <span>Machine Learning</span>
                    <span>17</span>
                </div>
                <div>
                    <span>Artificial Intelligence</span>
                    <span>11</span>
                </div>
                <div>
                    <span>AutoCad</span>
                    <span>05</span>
                </div>
                <div>
                    <span>IOT</span>
                    <span>25</span>
                </div>
                <div>
                    <span>Journalism</span>
                    <span>13</span>
                </div>
            </div>
        </div>
    </section>
   


    <!--    ------Footer------ -->
    <section class="footer">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing <br> Ipsam magni repudiandae, eum tempore id reprehenderit
            voluptate suscipit saepe, eaque, dicta nobis fuga sed nulla est voluptatibus atque quos fugit. Est.</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p>Made with <i class="fa fa-heart"></i>PJ</p>
    </section>
    <script>
        let navLinks = document.getElementById('navLinks');

        function showMenu() {
            navLinks.style.right = '0';
        }
        function hideMenu() {
            navLinks.style.right = '-200px';
        }

        $(document).ready(function () {
            $('#blog').parsley();

            $('#blog').on('submit', function (event) {
                event.preventDefault();

                if ($('#blog').parsley().isValid()) {
                    $.ajax({
                        url: "blogaction.php",
                        method: "POST",

                        data: $(this).serialize(),
                        dataType: 'json',

                        success: function (data) {

                            if (data) {
                                $('#blog')[0].reset();

                                $('#blog').parsley().reset();
                                alert("Thank you ");
                            }
                        }
                    });
                }
            });
        });


    </script>
</body>

</html>