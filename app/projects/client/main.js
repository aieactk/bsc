FlowRouter.route('/project', {
  name: '_default',
  action: function() {
    BlazeLayout.render('defaultIndex', { content: 'listProject'});
  }
});

FlowRouter.route('/project/:_id', {
  name: 'detProject',
  action: function() {
    BlazeLayout.render('defaultIndex', {content: 'detProject'});
  }
});
