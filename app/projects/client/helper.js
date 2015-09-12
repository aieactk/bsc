Template.listProject.helpers({
  'name' : function(){
    return Projects.find();
  }
});

Template.detProject.helpers({
  'detInfo' : function(){
    var paramId = FlowRouter.getParam("_id");
    var testObject = new Meteor.Collection.ObjectID(paramId);
    console.log(testObject);
    return Projects.findOne(testObject);
  }
});
