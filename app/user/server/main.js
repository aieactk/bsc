FlowRouter.route('/hello/:name', {
  name: 'hello',
  action: function(params) {
    BlazeLayout.render('defaultIndex', {content: 'securityPageLogin'});
  }
});
