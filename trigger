             Trigger: TRG_TEST2
               Event: UPDATE
               Table: a01
           Statement: begin
 delete from guidle_a01;

 insert into `idc_wgq`.`guidle_a01` (`uidle`, `gid`, `grange`, `maxloc`, `minlo
`, `gspan`)
 select uidle, group_id as gid, group_concat(location) as grange, max(location)
as maxloc, min(location) as minloc, count(group_id) as gspan from
(SELECT  `uidle`,`hostname`, `location`, @last_location, @countday:= (case when
(@last_uidle:=`uidle` and abs(`location` - @last_location)=1)
                                                        then
                                                         (@countday+1)
                                                        else
                                                         1 end ) as countday,
               (@group_id:=(@group_id+ if (@countday=1, 1, 0))) as group_id,
               @last_location:=`location` as last_location
               FROM
               (select `uidle`, `location`, `hostname` from `a01` where uidle!=
 order by `uidle`, `location`) t1,
               (select @countday:=0, @group_id:=0, @last_hostname:=0, @last_loc
tion:=0) t2 ) as t3
group by group_id;

set @info1 = new.tag;
set @info2 = old.tag;

INSERT INTO `idc_wgq`.`tagstore` (`newtag`, `oldtag`) VALUES (@info1, @info2);

end
              Timing: AFTER
             Created: NULL
            sql_mode: NO_ENGINE_SUBSTITUTION
             Definer: root@localhost
character_set_client: utf8mb4
collation_connection: utf8mb4_general_ci

insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a01 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a02 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a03 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a04 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a05 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a06 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a07 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a08 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a09 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a10 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a11 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a12 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a13 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a14 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a15 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a16 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a17 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a18 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a19 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a20 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a21 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a22 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a23 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a24 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a25 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a26 order by location desc;
insert into idc_axx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a27 order by location desc;







insert into idc_07_xxx(location, hostname, tag, uidle) select location, hostname, tag, uidle from idc_07_a01;

select location, hostname, tag, dev_class into idc_wgq.test from a01;
insert into test(location, hostname, tag, dev_class) select location, hostname, tag, dev_class from a02;
insert into test(location, hostname, tag, dev_class) select location, hostname, tag, dev_class from a03;


DELIMITER ||

DROP TRIGGER IF EXISTS `TRG_TEST2`;CREATE DEFINER=`root`@`localhost` TRIGGER `TRG_TEST2` AFTER UPDATE ON `a01` FOR EACH ROW
begin
 delete from guidle_a01;
 insert into `idc_wgq`.`guidle_a01` (`uidle`, `gid`, `grange`, `maxloc`, `minloc`, `gspan`) 
 select uidle, group_id as gid, group_concat(location) as grange, max(location) as maxloc, min(location) as minloc, count(group_id) as gspan from
(SELECT  `uidle`,`hostname`, `location`, @last_location, @countday:= (case when (@last_uidle:=`uidle` and abs(`location` - @last_location)=1)
							then
							 (@countday+1) 
							else 
							 1 end ) as countday,
               (@group_id:=(@group_id+ if (@countday=1, 1, 0))) as group_id,
               @last_location:=`location` as last_location
               FROM 
               (select `uidle`, `location`, `hostname` from `a01` where uidle!=0 order by `uidle`, `location`) t1,
               (select @countday:=0, @group_id:=0, @last_hostname:=0, @last_location:=0) t2 ) as t3
group by group_id;
end

delete from guidle_a01
insert into `idc_wgq`.`guidle_a01` (`uidle`, `gid`, `grange`, `maxloc`, `minloc`, `gspan`) 
 select uidle, group_id as gid, group_concat(location) as grange, max(location) as maxloc, min(location) as minloc, count(group_id) as gspan from
(SELECT  `uidle`,`hostname`, `location`, @last_location, @countday:= (case when (@last_uidle:=`uidle` and abs(`location` - @last_location)=1)
							then
							 (@countday+1) 
							else 
							 1 end ) as countday,
               (@group_id:=(@group_id+ if (@countday=1, 1, 0))) as group_id,
               @last_location:=`location` as last_location
               FROM 
               (select `uidle`, `location`, `hostname` from `a01` where uidle!=0 order by `uidle`, `location`) t1,
               (select @countday:=0, @group_id:=0, @last_hostname:=0, @last_location:=0) t2 ) as t3
group by group_id;


