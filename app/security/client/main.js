FlowRouter.route('/hello/:name', {
  name: 'securityPageLogin',
  action: function(params) {
    BlazeLayout.render('defaultIndex', {
      content: 'securityPageLogin'
    });
  }
});
