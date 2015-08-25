FlowRouter.route('/', {
  name: '_default',
  action: function() {
    BlazeLayout.render('defaultIndex', { content: 'homePageWelcome'});
  }
});
