
           document.addEventListener('DOMContentLoaded', () => {
              let btn = document.querySelector('#reg-customer');
              btn.addEventListener('click', () => {

                  const first_name = document.querySelector('input[alt=first_name]').value; 
                  const middle_name = document.querySelector('input[alt=middle_name]').value;
                  const last_name = document.querySelector('input[alt=last_name]').value;
                  const birth_date = document.querySelector('input[alt=birth_date]').value;
                  const complete_address = document.querySelector('textarea[alt=complete_address]').value;
                  const contact_number = document.querySelector('input[alt=contact_number]').value;   
                  const email_address = document.querySelector('input[alt=email_address]').value;    
                  const civil_status = $('#civil_status option:selected').val();
                  const age = document.querySelector('input[alt=age]').value;
                  const gender = $('#gender option:selected').val();
                  const username = document.querySelector('input[alt=username]').value;
                  const password = document.querySelector('input[alt=password]').value;
                  const status = document.querySelector('input[alt=status]').value;  
                  const image_profile = $('input[id=image_profile]').val();

                   

                  var data = new FormData(this.form);

                data.append('first_name', first_name);
                data.append('middle_name', middle_name);
                data.append('last_name', last_name);
                data.append('complete_address', complete_address);
                data.append('email_address', email_address);
                data.append('contact_number', contact_number);
                data.append('civil_status', civil_status);
                data.append('age', age);
                data.append('birth_date', birth_date);
                data.append('username', username);
                data.append('password', password);
                data.append('status', status);
                data.append('gender', gender);
                data.append('image_profile', $('#image_profile')[0].files[0]);


         if(first_name=="" || middle_name=="" || last_name=="" || complete_address=="" || email_address=="" || contact_number=="" || civil_status=="" || age=="" || birth_date=="" || username=="" || password=="" || image_profile==""){
                     $('#msg').html("<div class='alert alert-danger'><i class='fa fa-info'></i> Please input required field before submit!</div>");

                   return false;
                }else{ 
                      $.ajax({
                          url: 'controllers/add_client.php',
                          type: "POST",
                          data: data,
                          processData: false,
                          contentType: false,

                          async: false,
                          cache: false,

                          success: function(data) {
                              $('#msg').html(data);

                          },
                          error: function(data) {
                              console.log("Failed");
                          }
                      });
                  }     

              });
          });
