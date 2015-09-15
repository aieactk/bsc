Template.messagingPageCompose.events({
  'click #send': function() {
    console.log(this);
    PrivateMessages.insert({
      from: {
        id: 'lim@example.com'
      },
      to: {
        id: 'ihsan@example.com'
      },
      message: 'example message',
      created_date: new Date()
    });
  }
});
Template.messagingPageInbox.events({
  'click .remove-message': function() {
    console.log(PrivateMessages);
    PrivateMessages.remove({_id: this._id});
  }
})
