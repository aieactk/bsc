FlowRouter.route('/register', {
    name: 'register',
    action: function(params) {
        BlazeLayout.render('defaultIndex', {content: 'userPageRegister'});
    }
});

if (Meteor.isClient) {
    $(window).load(function() {
        $('button.register-submit').on('click', function(e) {
            var $form   = $('form.register-form'),
                email   = $form.find('input[name="email"]').val(),
                password= $form.find('input[name="password"]').val(),
                fullname= $form.find('input[name="fullname"]').val()
            ;
            console.log(email);
            console.log(password);
            console.log(fullname);
            Accounts.createUser({
                email: email,
                password: password,
                fullname: fullname
            }, function(error) {
                if (error) {
                    alert(error);
                } else {
                    Router.go('myprofile');
                }
            });

            return false;
        });
    });
}