FlowRouter.route('/account/messages', {
  name: 'messaging_index',
  action: function() {
    BlazeLayout.render('defaultIndex', { content: 'messagingPageInbox' });
  }
});
FlowRouter.route('/account/messages/compose', {
  name: 'messaging_new',
  action: function() {
    BlazeLayout.render('defaultIndex', { content: 'messagingPageCompose'})
  }
});
