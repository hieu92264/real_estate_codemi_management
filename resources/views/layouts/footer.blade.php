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
   
   <div class="footer">
       <div class="bg-light rounded-top p-2">
           <div class="row">
               <div class="col-12 col-sm-6 text-center text-sm-start">
                Copyright &copy; 07/2024 <a href="https://codemivietnam.com/">Codemi Việt Nam</a>. All rights reserved.
               </div>
           </div>
       </div>
   </div>
