                </div>
            </div>
        </div>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            /*
           Replacing Submit Button with 'Loading' Image
           Version 2.0
           December 18, 2012

           Will Bontrager Software, LLC
           https://www.willmaster.com/
           Copyright 2012 Will Bontrager Software, LLC

           This software is provided "AS IS," without 
           any warranty of any kind, without even any 
           implied warranty such as merchantability 
           or fitness for a particular purpose.
           Will Bontrager Software, LLC grants 
           you a royalty free license to use or 
           modify this software provided this 
           notice appears on all copies. 
        */
        function ButtonClicked()
        {
           document.getElementById("formsubmitbutton").style.display = "none"; // to undisplay
           document.getElementById("buttonreplacement").style.display = ""; // to display
           return true;
        }
        var FirstLoading = true;
        function RestoreSubmitButton()
        {
           if( FirstLoading )
           {
              FirstLoading = false;
              return;
           }
           document.getElementById("formsubmitbutton").style.display = ""; // to display
           document.getElementById("buttonreplacement").style.display = "none"; // to undisplay
        }
        // To disable restoring submit button, disable or delete next line.
        document.onfocus = RestoreSubmitButton;
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });
        </script>
    </body>
</html>