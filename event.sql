DROP database IF EXISTS participant;
CREATE  database participant;
USE participant;
DROP TABLE IF EXISTS participant;
CREATE  TABLE  participant
 (participation_id int, employee_name VARCHAR(20),
       employee_mail VARCHAR(30));

 DROP TABLE IF EXISTS  event;
CREATE  TABLE  event
 (event_id int, event_name VARCHAR(20),event_date DATE, version float);

 DROP TABLE IF EXISTS  participant_event;
 CREATE  TABLE  participant_event
  (participation_id int,  event_id int, participation_fee float);


