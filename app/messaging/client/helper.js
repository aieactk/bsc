Template.messagingPageInbox.helpers({
  messages: function() {
    return PrivateMessages.find({ "to.id": "ihsan@example.com"}).fetch();
  }
})
