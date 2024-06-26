   <style>
       html {
           position: relative;
           min-height: 100%;
       }

       body {
           display: flex;
           flex-direction: column;
           min-height: 100vh;
           margin: 0;
       }

       .content {
           flex: 1;
       }

       .footer {
           width: 100%;
           background-color: #f8f9fa;
           padding: 10px 20px;
           position: sticky;
           bottom: 0;
       }

       /* Responsive styles */
       @media (max-width: 576px) {
           .footer {
               text-align: center;
           }
       }
   </style>
   <div class="content">
       <!-- Nội dung trang web của bạn -->
   </div>

   <div class="footer">
       <div class="bg-light rounded-top p-4">
           <div class="row">
               <div class="col-12 col-sm-6 text-center text-sm-start">
                   &copy; <a href="#">Your Site Name</a>, All Right Reserved.
               </div>
               <div class="col-12 col-sm-6 text-center text-sm-end">
                   Designed By <a href="https://htmlcodex.com">HTML Codex</a>
               </div>
           </div>
       </div>
   </div>
