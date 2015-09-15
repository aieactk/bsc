Schema.User = new SimpleSchema({
  username: {
    type: 'string'
  },
  password: {
    type: 'string'
  }
});

Meteor.users.attachSchema(Schema.User);
