INSERT INTO Role (title, level) VALUES
('Administrator', 99),
('Writer', 50),
('User', 0);

INSERT INTO Person VALUES
('danilostojkovic', 'Danilo', 'Stojkovic', 'danilo.ricky@pentanews.com', 'danilostojkovic', 1, CURDATE(),''),
('davidemilan', 'Davide', 'Milan', 'davide.inter@pentanews.com', 'davidemilan', 1, CURDATE(),'davidemilan.png'),
('matteocasonato', 'Matteo', 'Casonato', 'matteo.quasinato@pentanews.com', 'matteocasonato', 1, CURDATE(),''),
('matteomidena', 'Matteo', 'Midena', 'matteo.milena@pentanews.com', 'matteomidena', 1, CURDATE(),'matteomidena.jpg'),
('admin', 'admin', 'admin', 'admin@pentanews.com', 'admin', 1, CURDATE(),''),
('user', 'user', 'user', 'user@useremail.com', 'user', 3, CURDATE(),''),
('writer', 'writer', 'writer', 'writer@writeremail.com', 'writer', 2, CURDATE(), '');

INSERT INTO Game (name, description, release_date, developer, game_img)
VALUES(
    'League of Legends',
    'League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the other’s base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.',
    '2009:10:27',
    'Riot Games',
    'league_of_legends.jpg'
),
(
    'Valorant',
    'Blend your style and experience on a global, competitive stage. You have 13 rounds to attack and defend your side using sharp gunplay and tactical abilities. And, with one life per-round, you’ll need to think faster than your opponent if you want to survive. Take on foes across Competitive and Unranked modes as well as Deathmatch and Spike Rush.',
    '2020:06:02',
    'Riot Games',
    'valorant.jpg'
),
(
    'Clash Royale',
    'Enter the Arena! From the creators of Clash of Clans comes a real-time multiplayer game starring the Royales, your favorite Clash characters and much, much more. \n
    Collect and upgrade dozens of cards featuring the Clash of Clans troops, spells and defenses you know and love, as well as the Royales: Princes, Knights, Baby Dragons and more. Knock the enemy King and Princesses from their towers to defeat your opponents and win Trophies, Crowns and glory in the Arena. Form a Clan to share cards and build your very own battle community.',
    '2016:03:02',
    'Supercell',
    'clash_royale.jpg'
),
(
    'Apex Legends',
    'Pick your character. Round up your squad. Show everyone what Legends are made of. \n
    Whether you’re battling on a massive floating city in Battle Royale or dueling in close-quarters Arenas, you’ll need to think fast. Master your Legend’s unique abilities and coordinate with your teammates to discover new tactics and powerful combinations. \n
    Master an expanding assortment of powerful weapons and equipment. You’ll need to move fast and learn the rhythms of each weapon to get the most from your arsenal. Plus change it up in limited-time modes, and get ready for a boatload of new content each season.
    Apex Legends takes place in an immersive universe where the story continues to evolve, maps change each season, and new Legends keep joining the fight. Make your mark on the Apex Games with a multitude of distinct outfits and join the adventure!',
    '2019:02:04',
    'Respawn Entertainment',
    'apex_legends.jpg'
),
(
    'Rocket League',
    'Rocket League, the sequel to Supersonic Acrobatic Rocket-Powered Battle-Cars, is a popular videogame that combines soccer and cars into its gameplay. For those who enjoy high-octane reckless driving and the world’s most popular sport, Rocket League is the game for you. This cross-genre arena battler is the latest craze on PC, PS4, Xbox One and Nintendo Switch. Fun for all players and abilities, the game offers both a casual and competitive atmosphere, as well as a ton of laughs.',
    '2015:07:07',
    'Psyonix Studios',
    'rocket_league.jpg'
),
(
    'Counter-Strike: Global Offensive',
    'Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content ',
    '2012:08:21',
    'Valve Corporation',
    'cs_go.jpg'
),
(
    'DOTA 2',
    'Every day, millions of players worldwide enter the battle as one of over a hundred Dota Heroes in a 5v5 team clash. Dota is the deepest multi-player action RTS game ever made and there’s always a new strategy or tactic to discover. It’s completely free to play and always will be - start defending your ancient now.',
    '2013:07:09',
    'Valve Corporation',
    'dota_2.jpg'
),
(
    'FIFA',
    'The legendary FIFA series has been produced by EA SPORTS for over 20 years, and is now the largest sports video game franchise on the planet. FIFA brings The World’s Game to life, letting you play with the biggest leagues, clubs, and players in world football, all with incredible detail and realism. Whether you want to build your dream squad in FIFA Ultimate Team, lead your favourite club to glory in Career Mode, take the game back to the streets with EA SPORTS VOLTA FOOTBALL, or get bragging rights over a friend in Kick-Off Mode, the FIFA series lets you play The World’s Game your way.',
    '1993:12:15',
    'Electronic Arts',
    'fifa.jpg'
),
(
    'Fortnite',
    'Fortnite is a massive multiplayer online video game released in July 2017, developed by Epic Games. The game includes two different game modes released as early access: Save the World and Battle Royale. \n
    Fortnite Battle Royale is the free 100-player PvP mode in Fortnite. One giant map, a battle bus, Fortnite building skills and destructible environments combined with intense PvP combat while the last one standing wins; and Save the World is a cooperative shooter-survival game with up to 4-man squad to fight off husks and defend mission objectives with fortifications and defenses.',
    '2017:07:21',
    'Epic Games',
    'fortnite.jpg'
),
(
    'Minecraft',
    'Minecraft is a sandbox construction video game developed by Mojang Studios where players interact with a fully modifiable three-dimensional environment made of blocks and entities. Its diverse gameplay lets players choose the way they play, allowing for countless possibilities.',
    '2011:11:18',
    'Mojang',
    'minecraft.jpg'
),
(
    'Overwatch',
    'Overwatch is a vibrant team-based shooter set on a near-future earth. Every match is an intense 6v6 battle between a cast of unique heroes, each with their own incredible powers and abilities. Clash in over 20 maps from across the globe, and switch heroes on the fly to adapt to the ever-changing situation on the field.',
    '2016:05:24',
    'Blizzard Entertainment',
    'overwatch.jpg'
),
(
    'Warzone',
    'Warzone™ Pacific arrives with a new map, trading in the Eastern European front of Verdansk for the sunny Pacific island of Caldera. With plenty of tropical landscapes to explore, there’s always some action above and below the surface. And for an action-packed World War II experience, take to the skies in "Vanguard Royale”, a new Warzone-based game mode featuring a fighter plane and Anti-Aircraft vehicles.',
    '2020:03:10',
    'Activision',
    'warzone.jpg'
),
(
    'Pok&#233;mon Unite',
    'Pok&#233;mon Unite is a free-to-play videogame published by Timi Studio Group for Nintendo Swtich Console first.',
    '2021:07:21',
    'TiMi Studio Group',
    'pokemon_unite.jpg'
);

INSERT INTO Article (id, title, subtitle, text, publication_date, cover_img, alt_cover_img, read_time, author, game_id) VALUES 
(
  1,
  'WHAT IS THE FORTNITE PLAYER COUNT IN 2021?',
  'Fortnite has been a huge success since launching, attracting record player numbers and bringing in a lot of revenue for Epic games. Just how many players are actually behind this wild success though?',
  '<p>At certain times since release, Fortnite has had a pretty impressive player base. A lot of people wonder about the exact size of the Fortnite player count. It seems like the game is incredibly popular, although there''s often a feeling that it is past its peak.</p><p>Most game developers rarely release this kind of information. There is an exception to this though, every now again Epic release some very specific data on the Fortnite player base. This is typically when the player base or active players reaches some kind of all-time high. We can figure out a bit of a bigger picture of the player count from this data and some other sources. While it is sometimes decreasing, the Fortnite player count in 2021 is still impressive.</p><p><br data-cke-filler=\"true\"></p><h3>HOW MANY PEOPLE PLAY FORTNITE?</h3><p>Epic Games doesn''t give entirely frequent or accurate pictures of how many people play Fortnite. We do have some metrics and measurements though for how many active players Fortnite has.</p><p>The first is the total amount of active accounts. We know that Fortnite had over 125 million players within a year of its release. It also seems that the total number of registered numbers is up to 350 million registered users. That is around 4% of the world''s population. Something about that fact probably doesn''t seem right though, does it? That''s because registered users are a pretty bad measure of the Fortnite player count.</p><p>The total registered users is just the total number of accounts created. This is by no means one per person. Lots of people have access to more than one Fortnite account, created accidentally or sometimes on purpose. On top of, if you''re wondering is Fortnite loosing players then this is a factor too. Registered accounts aren''t necessarily in use.</p><p>Even among big figures in Fortnite like the best Fortnite streamers or the top Fortnite pro players, have operated quite a few accounts under their own name. It might be against the rules, but that rule-breaking can be pretty brazenly flouted. Some players even start up a new account frequently to have a quick match with a lobby full of bots to practice. So registered users aren''t a particularly helpful measure of how many people are actually playing.</p><p>In terms of how many are actually active and playing, there were 12.5 million playing concurrently in 2019. Fortnite''s best ever month for player count was in 2018, when 78 million were actively playing in August. Additionally, back in December 2020, over 15.3 million players united to beat Galactus in a single-day event.</p>',
  '2021-05-14',
  'fortnite-player-count-number-of-players.jpg',
  'article image cover showArticleing a lot of fortnite characters',
  10,
  'danilostojkovic',
  9
),
(
  8,
  'CSGO MOVES &amp; RUMORS BEFORE THE NEW YEAR: MAJOR ROSTER SHUFFLES COMING',
  'Ahhh, the post-CSGO Major roster shuffle. What a time. Those who failed to achieve victory are questioning themselves and if  their team is capable of greatness.',
  '<p>There are many still rumored yet to be confirmed. Amongst the most interesting rosters that are changing is Team Liquid. The</p><p>once powerhouse North American team has fallen to new lows with their current roster. A massive shuffle is needed and that''s</p><p>exactly what they are doing.</p><p><br data-cke-filler=\"true\"></p><h3>THE CONFIRMED</h3><p>Liquid has confirmed a few big changes so far. They have officially announced the removal of FalleN, Stewie2K and Grim from</p><p>their starting lineups. Two of the three rumored signings have proven to be true. oSee, who got his big break on HenryG''s</p><p>Cloud9 roster, has now signed with TL. oSee has been showing good numbers in tier 2 playing on Extra salt, and has impressed</p><p>his peers in online ladder play. He will fill the role of AWPer, which TL has had a hard time filling with this past roster</p><p>with players passing the role back and forth.</p><p>The other big Liquid signing is shox. Though he has performed on an average level the last little while, he could be a good fit</p><p>for a support role Ã -la xyp9x, with his icy veins under pressure in the clutch. He is still one of the best players in the world</p><p>on LAN in 1vX situations. Since he is 29, he has been in every situation imaginable and has the tendency to make great plays. If</p><p>this is his last run on a tier 1 team, this is a good role for him to have. He may no longer have what it takes to be a star</p><p>player, but he has the knowledge and experience to contribute. This is the natural progression of a star CSGO player.</p><p>Over in Europe, TorbjÃ¸rn "mithR" Nyborg departed MOUZ for a coaching gig at Apeks. Unicorns of Love, sAw and Into</p><p>the Breach all released their rosters, with everyone seeking to re-build at the start of the year.</p><p><br data-cke-filler=\"true\"></p><h3>THE SPECULATION</h3><p>Recently, 100 Thieves announced that they would be transferring nitr0 to an unknown team. After more than a year out of the game,</p><p>he will be likely returning to CSGO and potentially TL? EliGE continues to speak highly of him, saying he wants Nitro as his IGL.</p><p>Nitro was on Team Liquid during their peak when they won the Grand Slam back in 2019. TL would have been the best team in the</p><p>world if it hadn''t been for the greatest team of all time, Astralis. I''m sure somewhere in the back of his mind Nitro thinks he</p><p>can get the team back to the heights at which they once were.</p><p>Meanwhile, MOUZ is looking at OG''s Valdemar BjÃ¸rn VangsÃ¥ for their roster into the upcoming season. Astralis is rumored to be</p><p>looking at Heroic talent for their roster revamp. Plenty of teams are holding the cards close to their chest, and more "leaks"</p><p>should arrive in the second week of January.</p><p>Until then, happy new year and brace for a hectic CSGO offseason.</p>',
  '2021-12-21',
  'csgo-valde.jpg',
  'article image cover showing a Counter Strike Global Offensive team',
  5,
  'matteocasonato',
  6
),
(
  2,
  'BEST SNIPERS IN WARZONE: THE FIVE BEST SNIPERS FOR YOUR WARZONE LOUDOUTS',
  'Here is our take on the best snipers in Warzone, where we break down what''s the best sniper in warzone for the average COD operator.',
  '<p>The best snipers in Warzone may often be an elaborate topic for all you Call of Duty (COD) fans out there. After all, it''s more than just crowning the highest damage weapons as the best snipers on warzone. Various factors can come into play, such as effective range, scope control and even bullet velocity, per se.</p><p><br data-cke-filler=\"true\"></p><h3>AX-50: THE BIG DADDY</h3><p>As its nickname suggests, the AX-50 lives up to its name as a deadly sniper rifle in the right hands. A headshot from this bad boy can guarantee a confirmed kill, putting the enemy forces at a massive disadvantage.</p><p>Coupled with its decent mobility, it''s not as punishing as the other options on the list for the high damage output. Ideally, you would want to be using the AX-50 at mid-range clashes, where it''s most effective. Although it does suffer from inaccurate aim down sights, this can be conveniently improved with attachments such as a Stippled Grip Tape, Tac Laser, and Singuard Arms Assassin.</p><p>The sniper role may often be synonymous with camping solo, but the AX-50 is built for more aggressive scenarios. Another reliable yet neglected alternative to mid-range combat is the SPR-208, which only a handful of seasoned players consider a deadlier Warzone sniper rifle.</p><p><br data-cke-filler=\"true\"></p><h3>HDR: THE CLASSIC AWP</h3><p>For the traditional sniper players, the HDR brings the nostalgic feel of what sniper rifles should deliver. A devastating shot at a very long distance is achievable with the HDR since it has one of the most extended ranges.</p><p>While longer range leads to poor damage drop-off, the Monolithic Suppressor and 26.9" HDR Pro barrel attachments provide desirable countermeasures. Furthermore, using the higher-calibre FMJ bullets will provide improved bullet penetration, leaving no safe spots for enemies.</p><p>Yet, all these perks come at only the cost of mobility, so some map awareness will come in handy. Knowing when the enemy is approaching close and navigating a new viewpoint will be critical for sneaky long-ranged shooters.</p><p><br data-cke-filler=\"true\"></p><h3>KAR98K: IF SNIPERS WERE MELEE WEAPONS</h3><p>Perhaps standing still during the entire match isn''t your cup of tea, and you had rather be bumping into foes at every corner. Then, the KAR98K is your go-to for its quick scoping tactics.</p><p>The KAR98K recently received buffs, where it can effectively deliver confirmed headshot kills. This makes it quite literally a pocket sniper rifle, which you can use aggressively. Considering its close-range benefits, KAR98K''s damage drop-off is not negligible, so the Monolithic Suppressor will offer some decent range.</p><p>Nonetheless, it''s still a sniper rifle that relies on one''s good aim, which is to consistently blow the enemy''s head. Aiming anywhere else, protected by armor, will not only result in an unfatal shot but provide enemies some breathing room to flunk you out.</p><p><br data-cke-filler=\"true\"></p><h3>ZRG 20MM: THE SNIPER MINIGUN</h3><p>There''s definitely no denying that the vast majority of COD player base loves close-range combat. Hence, another good close-range alternative is the ZRG 20MM, notably for featuring the highest bullet velocity.</p><p>Alongside its minimal bullet drop, we have ourselves a trendy pick among veteran COD players and newcomers alike. After all, bullet drop mechanics is presumably complicated to master and requires longer scoping periods.</p><p>If COD Warzone had taught us anything, it''s to rush into enemy frontlines without hesitation, so we highly recommend the ZRG 20MM for starters.</p><p><br data-cke-filler=\"true\"></p><h3>PELINGTON 703: YET ANOTHER ''MELEE'' SNIPER</h3><p>Lastly, the Pelington 703 serves as a solid alternative to the KAR98K for aggressive adversaries. It utilizes fast scoping, which with some practice, can work like clockwork at consistently sending out shots.</p><p>As aforementioned, you should play around corners and close combat so that you get the perks from using the Pelington 703 for such scenarios. Now that we depicted the Pelington 703 as a quick loading rifle, the best attachments would be the 27.2" Combat Recon and Infiltrator Grip, which improves bullet speed and overall movement speed, making you a speed demon in the match.</p><p>We briefed about the best sniper Warzone has to offer, it''s time to put them to the test. Do note that while these may be popular picks among COD players, there are still a vast array of weapons. So really, whatever secures you the most headshots would be your best snipers in Warzone to pick up.</p>',
  '2021-07-27',
  'Warzone-Sniper.jpg',
  'article image cover showing a a Warzone character using a sniper rifle',
  15,
  'danilostojkovic',
  12
),
(
  4,
  'JD Gaming signs ADC Hope',
  'Looks like JDG is getting its Hope up.',
  '<p>Wang "Hope" Jie will be JD Gaming''s starting ADC for the 2022 LPL Spring Split, the team revealed last night. Hope will fill the vacancy left by Lee "LokeN" Dong-wook, who left the squad earlier in the offseason.&nbsp;</p><p>The 21-year-old bottom laner has spent the vast majority of his career with EDward Gaming, playing with the organization for almost four years. During this time, Hope often weaved in and out of the main lineup, though he primarily played on EDG''s development team, EDG Youth Team. Playing as a starter for EDward Gaming in 2020, Hope and the team found only middling results. He was a standout after returning to the organization''s development division in the LDL, despite his teams early finish in the Spring Playoffs.&nbsp;</p><p>Hope will get another shot at the LPL main stage during the 2022 Spring Split-this time, with another team. JDG is similarly looking to rebuild after a lackluster season. They took home the 2020 LPL Spring Split Playoffs and made a decent run at Worlds 2020, but failed to rekindle that success the following year. JDG had an underwhelming playoffs run in the 2021 Spring Split and missed the playoffs altogether in the Summer Split.&nbsp;</p><p>JDG is similarly looking to rebuild after a lackluster season. They took home the 2020 LPL Spring Split Playoffs and made a decent run at Worlds 2020, but failed to rekindle that success the following year. JDG had an underwhelming playoffs run in the 2021 Spring Split and missed the playoffs altogether in the Summer Split.</p>',
  '2022-01-01',
  'JD-Gaming-1024x576.webp',
  'article image cover showing JD Gaming',
  8,
  'davidemilan',
  1
),
(
  3,
  'Arcane skyrockets League''s plays on Spotify',
  'Arcane brings an unprecedented rise for League of Legend''s Spotify account.',
  '<p>League of Legends'' plays on Spotify in 2021 had a tremendous uptick in November and December, according to League Charts. And Riot Games and Netflix''s Arcane has its share of responsibility. While January to October had monthly play counts ranging from 65 million to 99 million, the two final months of the year showed a radical improvement over the rest of the year, based on League Charts'' data.&nbsp;</p><p>The number of monthly streams jumped from 92 million in October to 221 million in November, when the League-inspired animated series Arcane launched. The month of December saw the highest volume of plays, rising by 100 million in just the span of a month and finishing at 327 million in total. November and December, the highest months in terms of activity, also marked the timespan for the show''s first season. The official League Spotify account sits at an impressive 26,938,790 monthly listeners.&nbsp;</p><p>The top listened-to songs for League reinforce the idea that Arcane is responsible for this massive growth. "Enemy," the title song for Arcane, sits at the current most popular song at 207,103,321 total plays. Other songs featured in the series, such as "Playground" and "Get Jinxed", have also emerged among the account''s top-played songs.&nbsp;</p><p>In addition, the Arcane soundtrack has been making the rounds on Spotify''s Top Global albums, according to SpotifyCharts, and has ranked among the most popular albums worldwide for six consecutive weeks, making the list since Nov. 25. Riot Games has substantially increased production in its music division.&nbsp;</p><p>Outside of Arcane and League projects, Riot also began its Sessions initiative, which features fair use music inspired by characters of its games. So far with a session for Vi and Diana, the lengthy albums feature various artists and animations for their respective characters.&nbsp;</p><p>The rise in plays for League is a testament to the growth and sustained popularity of Arcane, as well as Riot''s overall investment into music.</p>',
  '2022-01-02',
  'MTG-Arcane-Secret-Lair.jpg',
  'article image cover showing a moment from the Arcane show: Jayce and Viktor floating with magic',
  9,
  'davidemilan',
  1
),
(
  5,
  'Prime Gaming page leaks new VALORANT agent',
  'This is a nice surprise to end the year.',
  '<p>VALORANT players got their first look at the upcoming agent on the VALORANT Prime Gaming loot page today, which featured an image of the new character that likely wasn''t supposed to be posted yet.&nbsp;</p><p>A new VALORANT agent is always an exciting change since they can shake up the meta and breathe fresh life into the game. The agents are typically hinted at for months before being officially revealed, giving players Easter eggs and other cryptic hints to decipher.&nbsp;</p><p>The next agent is confirmed to be Filipino and will likely have an electricity-based kit, according to a recent blog post. The post also showed the agent''s shoes and one of them had a streak of lightning beneath its sole. These updates gave fans a look at what''s to come without officially revealing the character, but a new Prime Gaming image has completely revealed the agent. Fans can visit the Prime Gaming VALORANT page to claim in-game items like sprays and gun buddies.&nbsp;</p><p>But the page briefly featured an image of a never-before-seen agent today, which is likely the new agent coming in 2022. The picture shows a character holding a Frenzy running past other agents, seemingly hinting at a speed-based ability. The character''s name or class has not been revealed, but this improved speed might hint at another duelist joining the game. Riot Games has not officially announced the new agent and it''s unclear if this was an unintentional leak by Amazon. But fans can enjoy the last day of 2021 with a first look at the next agent coming to VALORANT.</p>',
  '2021-12-31',
  'FH9KQSOVUAIXVbN-1024x576.jpeg',
  'article image cover showing a random Valorant fan art',
  7,
  'davidemilan',
  2
),
(
  6,
  'Everything that happened in Apex Legends'' lore in 2021',
  'From Fuse to Ash and everything in between.',
  '<p>This year was closer to a decade in the lore of Apex Legends. Fans got to see an avalanche of storylines with new and old legends alike-and that''s even before taking into account the 208-page lore book Respawn Entertainment released in February. A lot happened in Apex even outside of Pathfinder''s Quest.&nbsp;</p><p>Respawn gave fans four new challengers, a new map, and stronger links to Titanfall than ever with the arrivals of Valkyrie and Ash. The season nine quest, The Legacy Antigen, had two parallel storylines-both essential to setting up key developments for some of the legends and for the big-picture lore. It''s easy to feel lost with so many arcs and narratives happening throughout the year. Here''s a rundown of the major story events that took place in Apex in 2021. Season eight: Fuse, Armageddon, and a lot of arm puns.&nbsp;</p><p>Our first legend of 2021 came in with a blast. Walter "Fuse" Fitzroy, Apex''s Explosives Enthusiast, joined the Apex Games in season eight hailing from the planet Salvo. His planet had been fighting off the Syndicate''s advances for decades, but this resistance created a fickle balance of power with several warlords gunning for the crown. Despite Salvo''s refusal to join the Syndicate when the Outlands Civil War ended in 2722, the planet backtracked and signed the Treaty with the Syndicate over a decade later. Salvo joining Syndicate space made Fuse, the Bonecage Champion, eligible to compete in the Apex Games. Of course, this brought the anger of diehard Syndicate opponent and Fuse''s childhood friend, Margaret "Mad Maggie" KÅhere. Fuse''s arrival came in with a storyline of his own.&nbsp;</p><p>For the season eight quest, Armageddon, the legends took on Mad Maggie after she attacked Kings Canyon. This insular storyline ended with Maggie''s perceived death. Maggie attacked Fuse and the explosion sent them both flying. They held onto a ledge, but she let go and dropped to her presumed demise. Armageddon didn''t have a tremendous impact on the rest of the story, at least for now, but it set up important development for Fuse. In addition to the quest, Respawn published two important pieces of information on Twitter.&nbsp;</p><p>The first was the two-part comic involving Caustic and Wattson, which related to the scientist''s plans to gas Solace and how Wattson defused his attempt. The other relates to Wraith and Bangalore and kicks off an important arc that would reappear in the following season, The Legacy Antigen. We''ve covered those in more detail in our season eight lore recap. Pathfinder''s Quest and "The Truth".&nbsp;</p><p>Pathfinder''s Quest was arguably the most significant part of Apex lore in 2021. The 208-page book gives out several details about the Outlands, the Syndicate, and the Frontier War, and helps shed some light on what happened to the universe-and the legends-in the 18 years between the end of the Frontier War and Apex. The book also revealed the answers to a handful of mysteries in one go, including the identity of Pathfinder''s creator-or rather, creators. Pathfinder was created by The Group, a cluster of scientists tasked with solving the Outlands'' energy crisis in the late 2650s. It was the same energy crisis Horizon identified years prior and The Group was looking for a way to refine Branthium, as discovered by Horizon. The ending of Pathfinder''s Quest was turned into an official short called "The Truth," made by GoldenLane Studios.&nbsp;</p><p>It recounts the most important moments: How Dr. Reid turned on The Group, how Pathfinder''s creators saved the Outlands by rerouting the Branthium, and their grim fates. For those who didn''t read Pathfinder''s Quest, this short is essential to understanding the storyline between Horizon, Dr. Reid, and Ash. Season nine: Valkyrie, Blisk, and Legacy. Apex''s ninth season is a blast from the past. Titanfall 2 players are familiar with the horrifying noise of Viper''s Flight Core during the boss fight. Now, they can meet his daughter-and the skies belong to her. Valkyrie made a Titan-sized impression when she landed in the Apex Games in season nine. She blamed Kuben Blisk, the former leader of the Apex Predators and current Apex Games commissioner, for her father''s death. Blisk gave her a chance to start anew and away from the shadow of her father: a card to the Apex Games.&nbsp;</p><p>This brought Valkyrie into the fray, but it was part of The Legacy Antigen, Apex''s longest quest so far. This two-part quest set up tremendously important arcs for several characters. We''ve covered it in detail in our dedicated Legacy Antigen recap. Season 10: The emergence of Seer. If Valkyrie brought strong ties to Titanfall, her successor came out of nowhere-but that doesn''t mean he didn''t steal fans'' hearts. Seer, the Ambush Artist from Boreas, made his way to the Apex Games from the Arenas and the build-up to his release was as unique as him. Instead of outright announcing the new legend, Respawn teased Seer with a folk tale called The Moth and the Flame, which told of a curse. This story turned out to be part of Boreas folklore and helped explain why Seer''s community believed he was cursed.&nbsp;</p><p>The night he was born, an asteroid shattered the planet''s moon and they took it as an ill omen. Seer is about rising past that perceived curse. In a season 10 loading screen, he said flaws or curses are what make people strong and unique, as long as they define that curse themselves and don''t let others define it for them. The artist is the embodiment of that principle, taking ownership of this curse and turning it into part of his persona. "The boy born under a bad omen and a terrible myth has taken this tale and created an even greater legend. He is Seer- an icon of the shunned, the unaccepted, and the unabashedly original," his bio says. Bloodhound''s Chronicle. Though season 10 was mostly light on lore, fans also had a "bite-sized" chronicle starring Bloodhound. The Technological Tracker confronted their guilt over several of their shortcomings-and eventually overcame it. This in-game story event had players follow the White Raven, a manifestation of Bloodhound''s guilt.&nbsp;</p><p>The animal taunted Bloodhound over their failures, and in the epilogue, it points out several moments where the legend perceives their failure. "You are no BlÃ³dhundr," the White Raven says. "You are a failure. You failed your mÃ³Ã°ir and faÃ°ir. You failed Boone. You failed your people. You failed your home." Bloodhound, however, realizes those shortcomings weren''t necessarily their fault. "My parents, Boone... to taka responsibility for all is to taka the power of the gods," Bloodhound says. "I am no god. And I am not nothing. I am BlÃ³dhundr." The Chronicle ended with Bloodhound rising past the darkness of their perceived failures, coming out owning the title of BlÃ³dhundr-and presumably forgiving themself and shedding the lion''s share of guilt from those situations. Bangalore teasers. By the end of season 10, fans were excited about what new stories could be brewing on the horizon-and Respawn was happy to give them a taste. A series of Bangalore teasers at the tail end of Emergence showed the crash site of the IMS Hestia, the ship in which Bangalore and her brother Jackson were stationed for years after the battle of Gridiron.&nbsp;</p><p>Though everyone believed Jackson was dead, Bangalore knew he''s alive and she''s trying her hardest to find him. The teasers pointed to somewhere called Storm Point, in Gaea. Though it gave fans a glimpse of a new arena in the next season, the weeks that followed brought far more than just a new venue for the Apex Games. Horizon wakes up a simulacrum. A series of Twitter comics signaled the build-up to Ash''s arrival as a contestant in the Apex Games. Horizon was still looking for answers for the whereabouts of her son and she believed Ash could know about that. To Horizon, Ash was the simulacrum version of her old friend, Lilian Peck, the founder of Olympus. She couldn''t have been more wrong. After the season five quest, when the legends assembled Ash, Hammond Robotics took the Olympus access codes out of Ash''s memory banks.&nbsp;</p><p>Horizon believed the only person who could know those was Lilian, and therefore, Ash would have to be Lilian Peck. Horizon set off to figure out how to "wake up" Ash and break the illusion she was a simulacrum, so she runs to the only being with that experience: Revenant. The immortal murder robot lets it slip that newer simulacra have special codes that will trigger the process and Crypto provides her with the necessary codes. Horizon goes to read the access codes to Ash, but Revenant sneaked behind her and tried to keep Ash from seeing a similar fate as him. Horizon manages to read the sequence and successfully "wakes up" Ash. But she''s not who Horizon thought she was.&nbsp;</p><p>This moment set off the storyline for the next season, including Ashes to Ashes, Ash''s episode of Stories from the Outlands. Season 11: Escape, Ash, and Storm Point. Ash has had one of the longest build-ups to her release in Apex history so far-and that''s even if you don''t count the two and a half years (and roughly two in-universe decades) between Titanfall 2 and Apex. Ash appeared as the artifact the legends assembled in The Broken Ghost and has been a part of the lore ever since.&nbsp;</p><p>Ash''s arrival also touches on Horizon''s long-running story arc after Respawn revealed what fans had suspected for nearly a year: that Ash was in fact Dr. Reid, Horizon''s assistant who left her stranded in space. As Dr. Ashleigh Reid''s body was dying after the events of Pathfinder''s Quest in 2658, Hammond Robotics personnel saved her by turning her into a simulacrum. The trauma from the experience-both the imminent death and the simulacrum process-split her into two different personalities, Ash and Leigh. Ash takes control most of the time and is the cutthroat mercenary fans saw in Titanfall 2. Leigh is dormant, though she appears in specific moments and in some in-game quips.</p><p>Leigh knows what happened to Horizon''s son, Newton. Reid seemed to be one of the few people to know he left the lab before the explosion, but he was presumed dead. Leigh wants to tell Horizon what she knows. Ash won''t let her. This dilemma kicked off a significant part of the story this season and is running through the seasonal quest, Trouble in Paradise. That''s the brunt of the lore so far, but that''s not all. Escape also introduced fans to the tropical paradise of Storm Point in Gaea, a paradisiac and derelict island. The former IMC base was abandoned when the Corporation pulled out of the Outlands and also by the people of Gaea-until the Syndicate found it, that is.&nbsp;</p><p>Storm Point still houses several secrets that will likely surface next year. The remains of Bangalore and Jackson''s ship, the IMS Hestia, are a Storm Point POI called Shipfall and it could eventually serve as another plot point for that story arc. Additionally, Wattson, Crypto, and Wraith are looking to rebuild a computer, according to the Paquette Repair Service loading screen. The season 11 quest, Trouble In Paradise, promises to set up major developments for Ash, Leigh, Horizon, and Apex''s big-picture lore. And that''s even before taking into account the four new legends (and possibly a new map) that will release throughout the year. With so many loose ends and still a fair share of the season quest to go, Apex lore shows great promise in 2022-as seen by brilliant storytelling throughout this year.</p>',
  '2021-12-29',
  'ash-2-1024x539.webp',
  'article image cover showing a character from Apex Legends',
  20,
  'davidemilan',
  4
),
(
  7,
  'HUYA DOTA2 INVITATIONAL 2021 FINALS PREDICTION AND MATCH ANALYSIS',
  'It''s been an incredible showing of Dota 2 talents at the Huya Dota2 Invitational.',
  '<p>Southeast Asia representative, OB.Neon surprised everybody with unexpected victories over the Chinese rivals. Notably,</p><p>they defeated team Royal Never Give Up and the famed Invictus Gaming to secure their position as grand finalists.</p><p>On the contrary, OB.Neon is at the brim of elimination in the Dota Pro Circuit 2021-22 (DPC2021-22) SEA region. Hence, we</p><p>were reasonably baffled by OB.Neon''s unexpectedly great run at the Huya Dota2 Invitational 2021.</p><p><br data-cke-filler=\"true\"></p><h3>INVICTUS GAMING VS ROYAL NEVER GIVE UP (LOWER BRACKET FINAL)</h3><p>With OB.Neon''s newfound victory over IG, the fans are divided even further on which Chinese powerhouse to side. On one hand,</p><p>IG is the Singapore Major champ and maintained a dominating form even in the International 10 (TI10). There''s no denying that</p><p>IG is arguably the most synchronized team in the market, as they have great team morale.</p><p>Whereas RNG rose to our expectations as a hot candidate to debut at the DPC2021-22. Housing several former PSG.LGD players and</p><p>other high-profile players, RNG''s current line-up looked significantly better than the trainwreck, Team Elephant. On paper,</p><p>both teams are formidable, so their match odds of approximately x1.85 odds reflects that.</p><p><br data-cke-filler=\"true\"></p><h3>MATCH PICKS, BANS &amp; STRATEGIES</h3><p>While the general odds are relatively even, there are exotic betting markets that may look enticing. Before that, let''s talk</p><p>drafts and strategies.</p><p>IG heavily relies on big team fight combos, which is an understatement since IG excels in initiations into clean teamwipes.</p><p>Their midlaner, Zhou "Emo" Yi is essentially IG''s sole playmaker, alongside both supports providing counter initiations and</p><p>saving mechanisms. We will certainly see Void Spirit or Ember Spirit picks for Emo, but that''s assuming their opponent isn''t</p><p>already opting for heavy lockdowns.</p><p>We saw OB.Neon effectively forced Emo to play outside his typical hero pool. This compromise was arguably what led to IG''s</p><p>downfall during the earlier upper bracket final. Hence, expect multiple long-range saving supports, such as Weaver and Abaddon.</p><p>Meanwhile, RNG opts for aggressive playstyles that often snowball well into the midgame. It''s a standard playstyle, that would</p><p>work most of the time if their opponent wasn''t an elusive player. Against IG however, team RNG will most certainly need to</p><p>re-evaluate their plans. Nevertheless, expect Lu "Somnusä¸¶M" Yao to play his signature picks, mostly aggressive carries,</p><p>such as Bloodseeker, Leshrac, or Broodmother if he''s feeling adventurous.</p><p>These heroes will force IG''s reaction as it would be impossible to ignore Somnus asserting dominance over the enemy territory.</p><p><br data-cke-filler=\"true\"></p><h3>MATCH PREDICTIONS AND ODDS</h3><p>Reviewing their playstyles, it''s evident that these teams love their teamfights, which of course means massacre. Albeit we will have</p><p>to side RNG on this match even though IG is the more seasoned team.</p><p>The death counter can increase drastically as the game progresses due to IG''s aggression. Total kills can reach well over 55.5</p><p>kills, which gives a decent x3.12 return. Another consideration is the match duration, which seems to average at over 40.5</p><p>minutes, rewarding x3.32 returns.</p><p>Special markets, such as "First Blood, Destroy First Tower, Kill First Courier and Win Map" can be a fun bet since it returns</p><p>x7.00 winnings. RNG is a good candidate for this particular bet since their aggressive draft calls for easy first blood,</p><p>quicker pushing capabilities, and win the map. There''s no doubt that it''s indeed a difficult task, but considering its multi-fold</p><p>returns, it''s worth the leap of faith.</p><p>Consider the "First Blood and Win Map" market in favor of RNG too. At a decent x3.06 return, it''s an easier alternative to the</p><p>previous market and has a higher chance of occurrence. These odds make for a great betting slip together and are exclusively</p><p>available on GG.bet.</p><p><br data-cke-filler=\"true\"></p><h3>OB.NEON VS ROYAL NEVER GIVE UP: GRAND FINAL (UPDATED)</h3><p>OB.Neon could pull off a win at the Huya Dota2 Invitational 2021, if they best RNG in their drawn out games. While OB.Neon have</p><p>proven their strength by taking down both RNG and IG before, it still easy to win a best of series versus any Chinese team.</p><p>The grand final is an excruciating best-of-five series, so there''s certainly less room for mere flukes. Expect more then 4 games</p><p>for sure in these series, and average game times longer then 30 minutes.</p>',
  '2021-12-31',
  'dota-huya-invitational.jpg',
  'article image cover showing a Dota 2',
  8,
  'matteocasonato',
  7
),
(
  10,
  'Players can play as any available Pok&#233;mon in Pok&#233;mon UNITE until Jan. 3',
  'The trial period will be limited to Standard and Quick Battles.',
  '<p>TiMi Studio has been releasing a lot of content in small bursts to celebrate the holidays and reward players before the New Year in Pok&#233;mon UNITE, and now there is an added bonus going live. From now until Jan. 3, players will be able to play as any Pok&#233;mon currently playable in the game, regardless of if they have acquired a Unite License for that Pok&#233;mon.</p><p>Players will be limited to using trial Pok&#233;mon in Standard and Quick Battles, meaning that you must own the Unite License for a Pok&#233;mon to use it during Ranked matchmaking.</p><p>Typically, players will need to have either unlocked or purchased a Pok&#233;mon’s Unite License in order to have access to them during a match. This is usually done by completing side missions, participating in limited-time events, or just outright buying the license with Aeos Coins or Aeos Gems.</p><p>TiMi also has several ways for players to try out a Pok&#233;mon before they decide to unlock them. The most common method is the free-to-try rotations, which change every Sunday and gives all players access to a set of four different Pok&#233;mon for that week.</p><p>Additionally, there are limited trial licenses that will unlock a specific Pok&#233;mon for a set number of days, typically ranging from one to seven days. These are obtained through completing side or event missions. This all-trial will run from now until Jan. 3 at 5:59pm CT and is available for the entire playable roster.</p>',
  '2021-12-31',
  'pokemon-unite-unlock-all-characters.jpg',
  'article image cover showing a list of almost all pokEmon playable',
  9,
  'matteomidena',
  13
),
(
  9,
  'All free and premium Battle Pass rewards for Pok&#233;mon UNITE: Agent of Disaster',
  'Time to put on a dark show.',
  '<p>Pok&#233;mon UNITE''s fourth Battle Pass is well underway, adding in new items, rewards, and Holowear themed around concerts, music, and putting on a show.</p><p>Agent of Disaster will run until Jan. 30 at 6pm CT, giving players plenty of time to complete the daily, weekly, and seasonal challenges in order to level the battle pass up and earn rewards.</p><p>For this season, players can obtain Pikachu - Concert Style and Absol - Dark Suit Style Holowear, along with items like the Dark Suit avatar set and a new profile expression. Just like with UNITE''s previous passes, the free-to-play MOBA offers options for players who want to spend money or just play casually. The Premium Battle Pass option is the only way to unlock the exclusive Holowear and half of the other available rewards.</p><p>And if you can reach Rank 60 in the battle pass, the Prize Box is available and will give rewards to players who surpass the maximum level by letting them roll for Aeos Tickets, Holowear Tickets, or Fashion Tickets. Just remember, you only have until Jan. 30 to earn all of the Agent of Disaster rewards.</p><h3>Sun, Sun, Sunshine rewards</h3><ul><li>Rank 1: Pikachu - Concert Style</li><li>Rank 2: 150 Aeos Tickets</li><li>Rank 3:Expression</li><li>Rank 4: 150 Aeos Tickets</li><li>Rank 5: 30 Item Enhancers</li><li>Rank 6: 150 Aeos Tickets</li></ul>',
  '2022-01-05',
  'pokemon-unite-premium-battle-pass.jpg',
  'article image cover showing two pokemons with unlocked premium clothes',
  12,
  'matteomidena',
  13
),
(
  18,
  'ROCKET LEAGUE FROSTY FEST 2021 RETURNS DEC 16TH: FULL DETAILS',
  'Rocket League has had a healthy stream of new content since the game went free-to-play, with more players than ever getting involved.',
  '<p style=\"margin-left:0px;\">Rocket League has had a healthy stream of new content since the game went free-to-play, with more players than ever getting involved. Like most other ongoing games, Rocket League is going to be getting a winter and holiday-themed event this year. Launching pretty soon, the event is going to have different challenges, LTMs, and cosmetics. The Rocket League Frosty Fest 2021 is just about to launch. This is what''s going to be happening:</p><h3 style=\"margin-left:0px;\"><strong>ROCKET LEAGUE FROSTY FEST 2021</strong></h3><p style=\"margin-left:0px;\">The Rocket League Frosty Fest is a yearly event that brings winter-themed fun to Rocket League. This year the event will have quite a few new items and limited-time modes.</p><p style=\"margin-left:0px;\">The Frosty Fest will be launching on December 16th, going live at 11 am CT. The main feature of the Rocket League Frosty Fest 2021 is going to be the challenges. These are a series of challenges that players will need to complete to get the exclusive limited-time cosmetics. These include the Ring-a-Ling wheels, Abominable Throwman title, decals, and other cosmetics. As soon as launching the game players get their first cosmetic, the Ski-Free player banner. This will be provided to everyone who logs in during the event.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><p style=\"margin-left:0px;\">Those are the items that you''re going to be getting for free. However, there are going to be some paid cosmetics available here too! The central new pack is the Frosty Pack. This is a bundle of cosmetics that is going to cost 1,100 credits. It contains Tygris (Crimson Painted), Frostbite Boost (Forrest Green Painted), Wonderment Wheels (Crimson Painted), and Sub-Zero Goal Explosion. (Forest Green Painted)</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>GOLDEN GIFTS</strong></h3><p style=\"margin-left:0px;\">Alongside the more specific Frosty Fest features coming to the game, Golden Gifts are also returning. These will have challenges alongside that you''ll need to complete five times. If you can manage that, you''ll unlock some items from Zephyr, Elevation, and Vindicator item series.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>ROCKET LEAGUE FROSTY FEST 2021 GAME MODES</strong></h3><p style=\"margin-left:0px;\">The cosmetics and fun unlockables are great to chip away at over the Frosty Fest. However, there are also some fun new forms of gameplay coming to the title. The LTMs are a major part of the Frosty Fest 2021. There will be seasonal variants of Beckwith Park in both Ranked and Casual matches. There will also be Winter Breakaway and Spike Rush coming to the game as LTMs.</p><p style=\"margin-left:0px;\">Winter Breakaway is a game mode that replaces the ball with the hockey puck from Spike Rush, it takes place on Throwback Stadium with a bit of snow. Spike Rush has the spike power up back, starting right after kick-off. A ball carrier can''t boost and will be demolished on impact. However, they can pass the ball instead.</p><p style=\"margin-left:0px;\">This event is going to be running throughout the rest of the year. There''s plenty of time to unlock all of the content that''s on show. If you''re more interested in the esports side of <a href=\"https://www.esports.net/news/rocket-league/\">Rocket League</a>, then the Frosty Fest 2021 might not be quite as big of a deal as the upcoming events. While the NSG Winter Championship is still underway, fans will have to wait a bit longer for top tier competitions. These events will be picking back up in 2021, once the Rocket League Frosty Fest 2021 is all finished up.</p>',
  '2022-01-19',
  '18.jpg',
  'frosty event snow cars',
  7,
  'matteomidena',
  5
),
(
  19,
  'ROCKET LEAGUE FALL MAJOR 2021 OPENING MATCH PREDICTIONS',
  'The opening matches at the RLCS Fall Major 2021 are looking stacked.',
  '<p style=\"margin-left:0px;\">The opening matches at the RLCS Fall Major 2021 are looking stacked. Of the eighteen teams, several are notable powerhouses that fans are eager to watch while others are perhaps teams that only recently debut in the RLCS 11 season.</p><p style=\"margin-left:0px;\">As is tradition, we dig into the hottest matches on opening day and set our predictions way ahead of time.</p><p style=\"margin-left:0px;\">Do note that all opening matches will be played simultaneously on <strong>December 8. </strong>To this end, we only stick to pre-match predictions and outrights ahead of the games kicking-off. If you are interested in <a href=\"https://www.esports.net/wiki/guides/esports-live-betting-made-easy/\">Live Betting</a> you should select the one you prefer yourself.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>G2 ESPORTS VS SANDROCK GAMING</strong></h3><p style=\"margin-left:0px;\">We are starting with the highly-anticipated G2 Esports showcase versus a relatively new Middle Eastern team, Sandrock Gaming. On paper, G2 has the qualifications, achievements, and prodigies in their arsenal. That alone speaks a lot on how the odds will certainly favor G2 in their match against an underdog. Moreover, they are keeping up with The General NRG, which many fans believe is currently in their prime.</p><p style=\"margin-left:0px;\">Perhaps the more concerning debate is how well will Sandrock Gaming fare up against these North American giants. Well, the good news is Sandrock Gaming is entering the opening match with a winning spree. They won all three regional events in the Middle Eastern &amp; North Africa (MENA) scene, which is certainly a commendable achievement.</p><p style=\"margin-left:0px;\">Nevertheless, the <a href=\"https://www.esports.net/betting/odds/\">Esports odds</a> are still in favor of G2 Esports at <strong>x1.26</strong> versus Sandrock Gaming at <strong>x3.62</strong> returns. We can''t go against the grain here, and G2 is the expected winner in my book.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>FAZE CLAN VS TEAM VITALITY</strong></h3><p style=\"margin-left:0px;\">Moving onto a more even match-up, FaZe Clan and Team Vitality are certainly no strangers in the RLCS scene. Both are regional favorites in the North America and Europe regions respectively.</p><p style=\"margin-left:0px;\">However, a poor showing from Team Vitality in the EU regional have made fans sceptical about the former champion''s strength. Frankly, the unexpected rise of Endpoint CeX and SMPR Esports as new challengers in the <a href=\"https://www.esports.net/news/rlcs-2021-22-fall-regional-3-favorites-matches/\">Fall regional events</a>, indirectly put Team Vitality at a disadvantage.</p><p style=\"margin-left:0px;\">FaZe Clan, on the other hand, has been in the spotlight among the NA powerhouses since its debut. For a roster that''s barely six months old, they sure put up a fight for the top seeds in the NA regional. Note that FaZe Clan individual player skills are distinctly better, which enable skill shots alongside the synergy among these teammates. Hence, most Esports bookmakers are siding FaZe''s victory, even if the popularity poll says otherwise.</p><p style=\"margin-left:0px;\">FaZe Clan has an <strong>x1.55</strong> odds versus Team Vitality at <strong>x2.35</strong> odds.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>ENDPOINT CEX VS RENEGADES</strong></h3><p style=\"margin-left:0px;\">Potentially a nail-biting series to catch, Endpoint CeX is all over the <a href=\"https://www.esports.net/news/rocket-league/\">Rocket League news</a> as a candidate with strong potential. These folks already topped the European regionals with ease, putting many EU powerhouses to shame. Hence, there''s without a doubt that Endpoint has zero concern about their opening match with Renegades. Besides the match, Endpoint has the capabilities to go further into the playoffs, potentially embroidering its name as another EU top dog. Such is the case of other formidable EU rivals, Dignitas and Vitality, which have delivered some of the most glorious <a href=\"https://www.esports.net/wiki/guides/rocket-league-goal-explosions/\">Rocket League goal explosions</a> in history.</p><p style=\"margin-left:0px;\">However, despite the bandwagon behind Endpoint''s glory, the odds aren''t too one-sided. Endpoint is still the favorites at <strong>x1.51</strong> odds but Renegades has <strong>x2.45</strong> odds. You might try going for a singles bet on Renegades to upset the EU newcomers in their debut.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>TEAM BDS VS COMPLEXITY GAMING</strong></h3><p style=\"margin-left:0px;\">For starters, Complexity now rocks the former roster of team True Neutral, a squad notoriously known for its aggressive maneuvers. However, team BDS, being the seasoned squad in the RLCS Fall Major, has polished the art of shutting down aggressive playstyles as their hallmark. We saw them do it against Dignitas and nearly made Endpoint CeX tremble over the thought of losing.</p><p style=\"margin-left:0px;\">Nevertheless, it would be unforeseeable to not have team BDS make it into playoffs, and the odds on <a href=\"https://www.esports.net/go/ggbet\">GG.BET</a> favor BDS at <strong>x1.45</strong> returns. Whereas Complexity Gaming has <strong>x2.63</strong> returns, which isn''t too wide of a gap, due to Complexity''s promising roster.</p><p style=\"margin-left:0px;\">These predictions are mostly based off past regional match analysis, so it wouldn''t be surprising if there are unexpected outcomes. Cross-regional play is a luxury in Rocket League nowadays, and we hope we are not wrong in our predictions, yet do hope surprises happen. Remember, the RLCS 2021-22 Fall LAN Major is the first LAN in two years since the pandemic halted Esports.</p><p style=\"margin-left:0px;\">Even among the big players, it''s been a while since they last faced each other head-on. We anticipate a shift in expectations after the opening matches, so check out upcoming <a href=\"https://www.esports.net/betting/rocket-league/\">Rocket League betting</a> matches.</p>',
  '2022-01-19',
  '19.jpg',
  'championship live player',
  7,
  'matteomidena',
  5
),
(
  14,
  'GAIMIN TO INTRODUCE NFTS AND PLAY-TO-EARN TO MINECRAFT',
  'In the near future, Minecraft could be pulled into the fast-developing world of play-to-earn.',
  '<p style=\"margin-left:0px;\">As part of a press release, Swiss firm GAIMIN revealed plans to introduce a ''metaverse environment'' featuring NFTs and play-to-earn mechanics in Minecraft. Reportedly, this release will feature what GAIMIN refers to as ''play-to-earn 2.0'', with players ''not even needing to be playing to earn assets''.</p><p style=\"margin-left:0px;\">However, there are concerns from the community regarding the integration of metaverse content within what is essentially a game for children. While there are plenty of ''grown gamers'' enjoying Minecraft, there can be no doubting the fact that it''s built primarily for younger gamers. Currently, GAIMIN, a company already neck-deep in the world of NFTs and cryptocurrency, hasn''t voiced any concerns about this issue of morality.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>MAKE MONEY WITH MINECRAFT NFTS</strong></h3><p style=\"margin-left:0px;\">As we head into 2022, GAIMIN has a broad vision set up for bringing the worlds of gaming and crypto ever closer together. In a Tweet posted on the 11th of January, GAIMIN stated that it sought to become the ''leading gaming tech company'', announcing the launch of an advanced esports team. Furthermore, the announcement came just days after the launch of the GAIMIN Genesis NFT collection.</p><p style=\"margin-left:0px;\">This Minecraft-focused venture would effectively introduce <a href=\"https://www.esports.net/news/best-play-to-earn-games/\">play-to-earn</a> mechanics to the ten-year-old game. When players seek to get involved with GAIMIN''s project, they''ll install a sophisticated plug-in that ''provides a dedicated metaverse'' for Minecraft. This will effectively permit players to use NFTs and ''blockchain-based components'' within Minecraft, a game that they already enjoy.</p><p style=\"margin-left:0px;\">In a statement, Joseph Turney, the Chief Gaming Officer at GAIMIN, said:</p><blockquote><p style=\"margin-left:0px;\">Minecraft is our first target for blockchain and gaming technology. We have developed our own Metaverse environment for Minecraft entirely based on blockchain and NFT technology. Minecraft players can access our Minecraft environment through the GAIMIN platform, play Minecraft, and passively generate GMRX rewards for in-game use.</p></blockquote><p style=\"margin-left:0px;\">Reportedly launching in February, the GAIMIN Minecraft project will give players the opportunity to earn cryptocurrency while playing the game. As soon as the GAIMIN token is listed, ''GMRX'' will acquire intrinsic value, and players will be able to use it to trade NFTs and other cryptocurrencies.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>EXPANDING THE METAVERSE</strong></h3><p style=\"margin-left:0px;\">Following the introduction of the Minecraft play-to-earn project, GAIMIN intends to influence other developers to follow in its footsteps. The CEO of GAIMIN has explained that the company will eventually provide an SDK that can be used by developers working with the Unreal platform. As one of the most common development platforms going into 2022, this would unlock untold Metaverse potential for developers around the world.</p><p style=\"margin-left:0px;\">Since 2017, GAIMIN has worked to empower the gaming community, at least where the blockchain is concerned. Its chief goal is pushing players to essentially monetise the computational power of their high-end gaming PCs. Should this project be a success, it could be a generational leap ahead for the firm, and a milestone for play-to-earn in general.</p>',
  '2022-01-19',
  '14.jpg',
  'Gaimin Gladiators',
  3,
  'danilostojkovic',
  10
),
(
  11,
  'CLASH ROYALE DECKS 2021: THE BEST DECKS OF THE SEASON',
  'Do you want to know the best Clash Royale decks?',
  '<p style=\"margin-left:0px;\">Decks are an important part of your performance in the game. There is undoubtable skill involved, but going into things with everything optimized is a big part of that. You could be winning or losing before you even start if you''re not using the best decks. If you''re wondering what is the best deck for Clash Royale? Then this is what you need to look at. While there isn''t a single objective best deck, there are loads that stand out from the crowd for different types of players.</p><p style=\"margin-left:0px;\">Learn about the best decks and cards you can use to be a champion in one of the best&nbsp;<a href=\"https://www.esports.net/news/mobile-games/top-mobile-esports-titles/\">mobile esports games</a>. That''s along with the best Clash Royale deck for beginners, and some of the top decks used by the best professional Clash Royale decks. The Clash Royale best deck 2021 will depend on what type of deck you want to run though.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>HOW DO CLASH ROYALE DECKS WORK?</strong></h3><p style=\"margin-left:0px;\">Each Clash Royale deck works differently. A lot of this comes down to play style, each of them works for a different unique player. You can''t just copy the top deck an expect it to work the same for you. However, if you''re willing to adapt then using the best Clash Royale decks in the meta in 2021 can make a big difference.</p><p style=\"margin-left:0px;\">However, while different they all work the same way in some aspects. A deck consists of a formation of 8 cards among which you must balance the use of:</p><ul><li><strong>Troops</strong>: These are essentially units that are going to attack your opponent and his troops.</li><li><strong>Spells</strong>: They take effect immediately by damaging (or throwing things, like a barrel of goblins) in an area.</li></ul><p><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>WHAT MAKES A CLASH ROYALE DECK GOOD?</strong></h3><p style=\"margin-left:0px;\">Clash Royale decks tend to be categorized regarding their trophies. But when we think about what is the best deck for Clash Royale, we must analyze several points that affect the way we build our deck. Generally, an efficient deck has the following features:</p><p style=\"margin-left:0px;\"><strong>1. OFFENSIVE/DEFENSIVE BALANCE.</strong></p><p style=\"margin-left:0px;\">In Clash Royale all troops have an offensive function, however, units like the "<i>Barbarian Girl</i>", the "<i>Baby Dragon</i>" or the "<i>Hunter</i>" can be considered defensive because of their ability to reduce the number of enemy waves (they have <a href=\"https://www.esports.net/wiki/guides/aoe-meaning/\">AoE</a> attacks).</p><p style=\"margin-left:0px;\">On the other hand, structure cards like the "<i>Crossbow</i>" or "<i>Cannon</i>" function only as defensive tools as they damage incoming enemies and also distract them from attacking your princess and king towers.</p><p style=\"margin-left:0px;\"><strong>2. UNITS ATTACK THAT COVER STRUCTURES, LAND, AND AIR.</strong></p><p style=\"margin-left:0px;\">An important feature of Clash Royale is that most troops that only attack ground units, or that have very little life, have an incredible attack. However, having troops that prevent a skeleton dragon from passing over your wave is essential.</p><p style=\"margin-left:0px;\"><strong>3. SHORT WAITING TIMES.</strong></p><p style=\"margin-left:0px;\">This is linked to the next point. In a game there tend to be deadlocks or waiting points that stem from a lack of elixirs to continue using cards. There are two reasons for this:</p><ul><li>Your cards are too expensive</li><li>You used too many spells</li></ul><p style=\"margin-left:0px;\">In any case, if both players/teams enter a timeout, everything is fine. But if the opponent has enough elixir to send you a Hog Rider you will lose any advantage you had (if you had any). The Clash Royale best deck in 2021 will balance these concerns.</p><p style=\"margin-left:0px;\"><strong>4. AN AVERAGE ELIXIR COST OF 4 OR LESS.</strong></p><p style=\"margin-left:0px;\">As a general rule, an average elixir cost of more than 4 means a lot of downtimes. So if you see a player with a 4.5 cost deck going against a more balanced one when <a href=\"https://www.esports.net/betting/clash-royale/\">Clash Royale betting</a>, you can consider it an almost safe bet.</p><p style=\"margin-left:0px;\">It''s mostly about keeping the balance. A deck based on the Giant &amp; Witch combo can be a bit heavy, just throwing those two troops together costs 10 elixirs.</p>',
  '2022-01-19',
  '11.jpg',
  'fire ball hitting castle',
  10,
  'matteocasonato',
  3
),
(
  12,
  'CLASH ROYALE LEAGUE 2021: CHANGES AND NEW FORMAT',
  'The Clash Royale League 2021 is seeing some big changes.',
  '<p style=\"margin-left:0px;\">The Clash of Clans spin-off Clash Royale has become one of the biggest games in mobile gaming, and a great success in mobile esports. This is a rapidly expanding market place, with big companies with Riot and Nintendo hoping to enter it in 2021 with the release of <a href=\"https://www.esports.net/news/wild-rift-and-honor-of-kings-esports/\">League of Legends</a> and PokÃ©mon titles. Clash Royale has built an impressive esports scene already, pre-empting many of these bigger names. The Clash Royale League 2021 is seeing some big changes though.</p><p style=\"margin-left:0px;\">Starting from the next year, the entire format for this event is being opened up. The developers behind the popular mobile game are returning to a more open event for Clash Royale''s League.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>WHAT IS CLASH ROYALE LEAGUE?</strong></h3><p style=\"margin-left:0px;\">The Clash Royale League is Supercell''s official Esports league for Clash Royale. This is the main event and the top tier of competition for players of the mobile game. In previous years, the event was organized into a more formal team-based format. The prize pool was still the biggest for the game, along with a coveted trophy.</p><p style=\"margin-left:0px;\">In 2020, the Clash Royale League had a prize pool of $225,000. Teams first competed in a group stage, with the top six teams advancing forward into the play-offs. This tournament playoff was just the culmination of the event though. &nbsp;An entire season of events precipitated the finals. Two of these were held in each year, as a Spring and Fall Season.</p><p style=\"margin-left:0px;\">That''s how the League normally works, it is going to be quite different for the Clash Royale League 2021.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>CLASH ROYALE LEAGUE 2021 CHANGES AND FORMAT</strong></h3><p style=\"margin-left:0px;\">The Clash Royale League 2021 is switching to a more anarchic format, throwing out the formal league structure entirely! The league is removing teams entirely. Players will be competing individually instead. The competition is going to be a full-on free for all. While this news might seem like it''s reducing things, it is coming with a major boost in prize money. The pool for the Clash Royale League 2021 is climbing up to $1.6 million.</p><p style=\"margin-left:0px;\">The league will next year switch to a full global tournament. Over the year, eight seasons are going to be taking place. In each, there will be a Royale Rumble, followed by monthly qualifiers, and a monthly final in a play-off structure. The Royale Rumble cuts the entrants down to just the top 1,000 players. These qualifiers then whittle things down further.</p><p style=\"margin-left:0px;\">The whole event will come to a close in the Clash Royale League 2021 World Finals. This is going to take place in October and be a testing ground for the players who have excelled throughout the entire year.</p><p style=\"margin-left:0px;\">The more open format for the Clash Royale League is a big change for the League. It is bound to have an effect on how the action goes down, with players just competing for themselves rather than a team. This new approach is looking to liven things up a bit. With more Clash Royale League 2021 events happening than ever, with bigger prize pools too.</p>',
  '2022-01-19',
  '12.jpg',
  'King shield',
  7,
  'matteocasonato',
  3
),
(
  13,
  'FIFA WORLD CUP 2021: TOURNAMENT INFO, SCHEDULE AND PLAYERS',
  'The FIFAe World Cup 2021 is being held between 6-8 August 2021, in London.',
  '<p style=\"margin-left:0px;\">The FIFAe World Cup 2021 is being held between 6-8 August 2021, in London. For the 16th time, the best 32 players from across the globe battle for $500,000 USD in prize funds and the title of best FIFA player in the world.</p><p style=\"margin-left:0px;\">FIFA has always been the go-to franchise for recreating football virtually. Over the past year though, its esports side has seen huge growth. With traditional sports off of the table for a few months, FIFA stepped up to fill that gap. Last year''s FIFAe Club World Cup was the biggest seen to date. This year is shaping up to be an even bigger event.</p><p style=\"margin-left:0px;\">The FIFAe World Cup 2021 is the main event for competitive esports in football. It sees the top players internationally compete together to find the best in the world is. This is what you need to know about the event, and what''s happened with the qualifiers thus far.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>FIFAE WORLD CUP 2021: TOURNAMENT STRUCTURE</strong></h3><p style=\"margin-left:0px;\">The FIFAe World Cup brings the top players from the various international regions together. The event culminates a long season of regional events and qualifiers that pit the best individual FIFA players on Xbox and PlayStation against each other.</p><p style=\"margin-left:0px;\">Players qualify via Regional Leagues and Tournaments in seven regions: Europe, North America, South America, Oceania, South Africa and East and West Asia. During the season they collect points that lead them towards Regional Finals that ultimately award spots in the event. Matches are played separately for Xbox and PlayStation.</p><p style=\"margin-left:0px;\"><strong>FIFAE WORLD CUP 2021 GROUP STAGE</strong></p><p style=\"margin-left:0px;\">The main event opens up with a group stage. Here, four groups of eight players are competing in a round-robin format. The top players from each group are going to be moving forward to the tournament playoffs.</p><p style=\"margin-left:0px;\">We don''t have the group stage''s rosters decided just yet. Most of the qualifying events will conclude by the end of this month, and we will update this section accordingly. Currently only one player has been confirmed on the player roster. Dylan <strong>"Dylan"</strong> Campbell from the organization Dire Wolves is the first player to secure a spot after winning the Oceania Playoffs.</p><p style=\"margin-left:0px;\">As more regional events conclude, we''ll see which other players are making it through to the group stage. At the moment, the only confirmed participant is Dylan. However, we''re going to end up with 32 players in competition by the time the FIFAe World Cup 2021 kicks off. After each of these players compete, the top four players are moving forward with the bottom four going home.</p><p style=\"margin-left:0px;\"><strong>FIFAE WORLD CUP 2021 PLAYOFFS</strong></p><p style=\"margin-left:0px;\">Once the group stages for the FIFAe World Cup 2021 finish up, we''ll move over to the playoffs. The players that are involved are going to be placed into a single-elimination bracket. By the end of this bracket, a winner will be found. This is due to conclude on August 8th.</p><p style=\"margin-left:0px;\">As more regional events conclude, we''ll see which other players are making it through to the group stage. At the moment, the only confirmed participant is Dylan. However, we''re going to end up with 32 players in competition by the time the FIFAe World Cup 2021 kicks off. After each of these players compete, the top four players are moving forward with the bottom four going home.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>FIFAE WORLD CUP 2021 BETTING</strong></h3><p style=\"margin-left:0px;\">Betting markets are not yet available for this FIFAe event. However, you can expect outright betting markets to open up during July for the main event. There should be plenty of outright <a href=\"https://www.esports.net/betting/odds/\">esports betting odds</a> available for your favorite player. Once odds become available, check in with our <a href=\"https://www.esports.net/news/\">Esports News</a> section for specific picks and predictions on a daily basis.</p><p style=\"margin-left:0px;\">The FIFAe World Cup 2021 is going to be a huge event for the game, however, it is still a ways off. While this is the biggest event for <a href=\"https://www.esports.net/betting/fifa/\">FIFA betting</a>, there is loads going on before that. The biggest tournaments over the next few months are going to decide which players are going to be contenders here. Out of these players, we can likely expect to see some of the ranking players from previous years.</p>',
  '2022-01-19',
  '13.jpg',
  'World Cup',
  13,
  'matteocasonato',
  8
),
(
  15,
  'MINECRAFT GAMERS CAN NOW PLAY FOR BITCOIN',
  'Creators Mojang revealed last November that Minecraft had outsold Tetris and become the bestselling game of all time.',
  '<p style=\"margin-left:0px;\">So, it is hardly surprising that as blockchain and cryptocurrencies become part of game worlds and developments, you can now play Minecraft for bitcoin.</p><p style=\"margin-left:0px;\">A whopping <a href=\"https://www.polygon.com/2019/11/7/20952214/minecraft-most-important-game-of-the-decade-2010\">176 million units</a> of the Minecraft game have been sold. And actually, as per <a href=\"https://www.ccn.com/minecraft-treasure-hunt-satoshiquest-will-cost-you-1-on-the-bitcoin-trail/\">CCN</a>, the cryptocurrency bitcoin, and the ability to earn it, was already being built into Minecraft servers as early as 2015.</p><p style=\"margin-left:0px;\">For example, PlayMC was a popular Minecraft server where gamers could earn satoshis, a denomination of Bitcoin, by completing in-game tasks. It may be that the satoshi rewards became untenable when bitcoin''s price and transaction fees rose. At bitcoin''s price peak, transaction fees, the fees for buying or spending with bitcoin rose to $65 per transaction.</p><p style=\"margin-left:0px;\">As per <a href=\"https://bitcoinist.com/minecraft-meets-bitcoin-with-satoshi-quest-treasure-hunt/\">Bitcoinist</a>, bitcoin transaction fees are currently at $0.25-$0.30 per transaction. However, if Bitcoin''s price or use increases rapidly, like in 2017, these transaction fees could rise again. For those not too familiar with cryptocurrencies it''s worth noting that transaction fees and structures vary from coin to coin. And, cryptocurrency developers, including bitcoin developers, are working on ways to provide better structures and lower fees. By doing this, cryptocurrencies will see wider consumer utilisation.</p><p style=\"margin-left:0px;\">Others have tried to incorporate cryptocurrency use or reward into Minecraft servers, but as yet none of the projects have really gained traction.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>SATOSHIQUEST MINECRAFT SERVER: A MINECRAFT TREASURE HUNT FOR BITCOIN</strong></h3><p style=\"margin-left:0px;\">It now appears another developer is taking a shot at creating a Minecraft server where bitcoin can be "earned." The new SatoshiQuest Minecraft server has just been launched. It''s a treasure hunt where players pay $1 for Minecraft lives to play. The "entry" fees, or most of them, go into a bitcoin prize fund which forms the treasure. Minecraft players can then explore the domain searching for the bitcoin. Players have their own game cryptocurrency wallet which is linked to their Minecraft ID and where they can store their bitcoin.</p><p style=\"margin-left:0px;\">Players are able to purchase multiple "lives" at once, so this also saves on transaction fees. Players must deposit Bitcoin into their game wallet or deposit address to buy lives which are charged at the equivalent of $1 each in Bitcoin.</p><p style=\"margin-left:0px;\">Of the $1 per play 10% goes to the developer and 90% to the treasure fund. When a player discovers and claims the treasure, they receive 50% of it, up to a maximum of $200, with the remainder going into the next rounds prize fund. When treasure is found and claimed, other players lose a life.</p><p style=\"margin-left:0px;\">Like many blockchain and cryptocurrency developments, the coding and software behind SatoshiQuest is open source and published on <a href=\"https://github.com/BitcoinJake09/SatoshiQuest\">GitHub</a>. The developer appears to be independent. With bitcoin transaction fees low it''s a good a time as any to release such a server.</p><p style=\"margin-left:0px;\">SatoshiQuest is another example of how cryptocurrency can disrupt gaming. Game publishers, some of them the most successful in the world like <a href=\"https://www.esports.net/news/ubisoft-entrepreneurs-lab-adds-another-blockchain-gaming-startup/\">Ubisoft, are investigating blockchain</a> and <a href=\"https://www.esports.net/news/industry/what-are-nifties-to-gaming-and-why-are-the-winklevii-getting-into-collectibles/\">cryptocurrencies for tokenization</a> and to create in-game economies. These developments will see more players being able to "earn" cryptocurrencies or hold or trade tokenized game accessories with real world value.</p>',
  '2022-01-19',
  '15.jpg',
  'Minecraft and bees',
  4,
  'danilostojkovic',
  10
),
(
  16,
  'OVERWATCH LEAGUE FREE AGENCY: VARIOUS TEAMS MAKE CHANGES FOR 2022',
  'Some big moves are coming into competitive Overwatch.',
  '<p style=\"margin-left:0px;\">Plenty of OWL teams are looking to shake things up this season in preparation for Overwatch 2 and building momentum into it.</p><p style=\"margin-left:0px;\">While we still do not officially have Overwatch 2, and the earliest expected date seems to be November 2022, there is not much going on in the world of Overwatch for casual players. However, when it comes to the professional scene, there are some big changes going on in certain teams.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>NYXL FULLY REVAMPS</strong></h3><p style=\"margin-left:0px;\">The New York Excelsior revealed an entire new roster paired with a return to the west after a season in the east region. The team finally left South Korea and will compete from their home city in 2022. The entire roster took a big re-shuffle. Yim <strong>"Flora"</strong> Yong-woo is the only player remaining, and is joined by <strong>Kellan</strong>, <strong>Gangnamjin</strong>, <strong>Myunb0ng</strong> and <strong>Yaki.</strong></p><p style=\"margin-left:0px;\">Kim "Kellan" Min-jae is currently the only tank on the roster. In order to meet the roster requirment, NYXL will have to add some additional players before the season kicks off.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>VANCOUVER TITANS SIGNS SKAIRIPA AND SEICOE</strong></h3><p style=\"margin-left:0px;\">If you have been watching the European Overwatch Contenders scene, you are might already be familiar with these two incredible players that have been around for years. We are, of course, talking about Robert "Skairipa" Lupsa and "Maximilian "Seicoe" Otter that is joining the Vancouver Titans roster.</p><p style=\"margin-left:0px;\">The Romanian support player Skairipa has been in the scene since 2019, and he made a name for himself while playing for teams like Raspberry Racers, Obey Alliance, and Young and Beautiful. Last year, he was playing for the British Hurricane where he won not one but two European Contenders championships.</p><p style=\"margin-left:0px;\">The Austrian DPS Seico also had quite a lot of experience before his new signup for the Vancouver Titans, as he played for European teams like New Kings, Shu''s Money Crew EU, and Ex Oblivione. Seico was also quite successful, as he managed to win four monthly Contenders while playing for Falcons Esports EU.</p><p style=\"margin-left:0px;\">With these two players signed up for Vancouver Titans, the team has met the minimum requirement for the Overwatch League. The roster seems to be looking quite hot, as this team now has not only Skairipa and Seico on the team, but also veterans like the DPS Luka "Aspire" Rolovic and support Petja "Masaa" Katanen.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>PHILADELPHIA FUSION BRINGS IN REINFORCEMENTS</strong></h3><p style=\"margin-left:0px;\">It can be easily said that 2021 was quite a difficult year for Fusion, but 2022 might give them different results after signing up one of the best flex support players that the Overwatch competitive scene has to offer, which is Kim "AimGod" Min-seok.</p><p style=\"margin-left:0px;\">AimGod should be a name that many OWL fans already know as he was around since the beginning in 2018. The first team he played for was Boston Uprising, and he made quite a name for himself with incredible support. Later on, he joined Washington Justice in 2020, but he was dropped as the season concluded. In 2021, he played for the academy team of Shanghai Dragons, Team CC.</p><p style=\"margin-left:0px;\">Another change that Fusion did for the upcoming season of OWL is bringing back Kim "Fury" Jun-ho, the off-tank player that many would know him from previous performances in this team. While he was not on Fusion, you could have seen him play for Washington Justice during 2021.</p><p style=\"margin-left:0px;\">Besides this, Fusion also announced that the team is going to be staying in Seoul, South Korea where they competed during most of 2021 due to the pandemic. So far, they revealed only 5 players, and they are keeping the last one and the substitute as a surprise, since they had to be signed up by Jan. 3, 2022, anyway.</p><h3 style=\"margin-left:0px;\"><strong>CHENGDU HUNTERS'' COACH RUI STEPS DOWN</strong></h3><p style=\"margin-left:0px;\">After coaching the team since 2018, Xingrui "RUI" Wang decided that he will not be the coach for Chengdu Hunters during the fifth Overwatch League season that kicks off in April. While he is indeed not being the coach, he is still going to stay in the organization as an honorary advisor. The main reason behind RUI stepping down as coach are health issues and the need to spend more time with his family.</p><p style=\"margin-left:0px;\">While Hunters did not announce who is going to be replacing RUI as the coach for the upcoming season, they did announce a new assistant coach Jeong-min "Jfeel" Kim who was previously the coach of Shanghai Dragons as well as London Spitfire.</p><p style=\"margin-left:0px;\">These are some quite interesting changes to the roster of some of our favorite teams, and the year has only just begun. We cannot wait for new announcements to come, and what we are all waiting for even more is to see all of the players in their new teams in action.</p>',
  '2022-01-19',
  '16.jpg',
  'overwatch live',
  7,
  'davidemilan',
  11
),
(
  17,
  'OVERWATCH WINTER WONDERLAND 2021 START DATE MOVED TO DECEMBER 16',
  'Overwatch Winter Wonderland 2021 has been officially set for December 16th.',
  '<p>Things are a little weird for Overwatch fans right now. There are a couple of in-game things which might be perking them up a bit soon. There''s a community tournament coming soon, and the Winter Wonderland finally has a start date. While Overwatch is in a little bit of a lull right now. The sequel''s release date has frequently shifted, and the Overwatch League is still in a mess with sponsors, as stories emerged about the workplace culture at Blizzard at large. It is no wonder that the game has seen chaotic experimental patches and troublesome releases.</p><p><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>OVERWATCH WINTER WONDERLAND 2021 DELAYED TO DECEMBER 16</strong></h3><p style=\"margin-left:0px;\">The Overwatch Winter Wonderland is an annual occurrence in the game. Each time, the seasonal game modes return and let you rack up points in challenges to earn one of a few new cosmetics in the title. The gameplay for these events might be pretty well-worn by now, but the promise of some new content always re-engages the fanbase.</p><p style=\"margin-left:0px;\">The Overwatch Winter Wonderland 2021 event should''ve kicked off last week. Last year it launched on December 15th, and had already launched by December 10th in 2019. However, this year the event run into some problems. First up, Overwatch posted social media teases and pre-download for patches, yet nothing appeared. The assigned social media manager said that the event was being delayed by "a few days". This was a vague delay, but they came clear a bit later announcing the event on December 16th.</p><p style=\"margin-left:0px;\">The official Overwatch page still does not contain any update for this event or the rewards, and all data available is for last years'' event.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>ACTIVISION BLIZZARD STRIKE TO BLAME?</strong></h3><p style=\"margin-left:0px;\">Right now, Activision Blizzard is being hit by one of the biggest scandals in gaming history. A number of escalating allegations of sexual misconduct have stacked on, along with a stubborn refusal to accept the problems by management. This eventually led to many in the industry to call for the CEO to resign, something that hasn''t happened. Alongside these problems, the common issues with worker treatment from AAA studios have reared their head. A number of QA testers were unceremoniously fired by the company recently. To many, it is just further evidence of the problems at the studio. This has led to a fairly big strike against Activision Blizzard''s continued refusal to address the systematic rot that seems to have spread across the entire company.</p><p style=\"margin-left:0px;\">Activision Blizzard has responded with what is now characteristic tone-deafness. They essentially decided to use the opportunity to attempt some union-busting, threatening ''consequences'' for those employees who join a union. While Activision is engaging in borderline union-busting, the community around these devs has stepped up to support workers. Over $300,000 has been raised for a strike fund in a <a href=\"https://www.gofundme.com/f/abk-strike-fund\">GoFundMe</a></p><p style=\"margin-left:0px;\">It is unlikely that these continued problems are completely unrelated to delays. With that in mind, it might be difficult to know when work will resume on all titles properly. Most things are facing delays, including Overwatch 2.</p><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><h3 style=\"margin-left:0px;\"><strong>OVERWATCH EXPERIMENTAL PATCH AND COMMUNITY CUP</strong></h3><p style=\"margin-left:0px;\">In some slightly brighter news for the game, an experimental patch has captured the community''s attention. This patch was in no way trying to build a more balanced game. Instead, it has broken various aspects to give the game more fun and chaotic balance for a little while. This experimental patch is one of the closest things Overwatch gets to evolution anymore, so those who have stuck with the title through what can easily be called its worst year have some fun ahead of them.</p><p style=\"margin-left:0px;\">The Overwatch Creator Cup was held over the last week. It had a prize pool of $4,500-5,5000 depending on the region, with other prizes available to teams here too. The Christmas tournament is more for bragging rights than a title or a prize though.</p><p style=\"margin-left:0px;\">This is a smaller tournament. It isn''t going to be a big part of <a href=\"https://www.esports.net/betting/overwatch/\">Overwatch betting</a> or eclipse the League. However, it is a nice bright spot for the Overwatch community in the last few weeks. The game is suffering from a complete lack of content, and delaying even the now fairly predictable seasonal game modes isn''t exactly promising. However, until situations internally at Activation-Blizzard can be settled it is difficult to say when we can expect more from the game.</p>',
  '2022-01-19',
  '17.jpg',
  'penguin girl with robot',
  4,
  'davidemilan',
  11
);

INSERT INTO Genre (name)
VALUES 
('MOBA'),
('action'),
('FPS'),
('shooter'),
('strategy'),
('RTS'),
('simulation'),
('sports game'),
('survival game'),
('adventure'),
('MMO'),
('driving/racing game'),
('card game'),
('RPG'),
('horror'),
('puzzle'),
('indie'),
('rhythm & music game'),
('platformer'),
('arcade');

INSERT INTO game_genre
VALUES
(1,1),
(1,2),
(2,4),
(2,3),
(3,5),
(3,6),
(4,3),
(4,4),
(4,2),
(5,12),
(5,2),
(6,3),
(6,4),
(6,2),
(7,1),
(7,2),
(8,7),
(8,8),
(9,4),
(9,2),
(9,9),
(10,10),
(10,20),
(10,11),
(11,3),
(11,4),
(12,3),
(12,4),
(13,1),
(13,2);


INSERT INTO Tag(name) VALUES 
('tournament'), 
('flash'), 
('scandalous'),
('rewards'),
('decks'),
('crypto'),
('season pass'),
('mobile'),
('PC'),
('console'),
('roster'),
('teams'),
('Worlds'),
('recap'),
('highlights'),
('drama'),
('prizes'),
('player'),
('disqualified'),
('characters'),
('season'),
('sport'),
('event'),
('match'),
('predictions');

INSERT INTO article_tags (tag_id, article_id) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(1, 3),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(11, 8),
(12, 8),
(7, 9),
(8, 9),
(8, 10),
(20, 10),
(8, 11),
(5, 11),
(21, 11),
(8, 12),
(1, 12),
(1, 13),
(10, 13),
(22, 13),
(6, 14),
(9, 14),
(2, 14),
(6, 15),
(9, 15),
(2, 15),
(11, 16),
(12, 16),
(13, 16),
(23, 17),
(17, 17),
(23, 18),
(17, 18),
(1, 19),
(24, 19),
(25, 19);

INSERT INTO liked_articles VALUES
('danilostojkovic', 2),
('matteomidena', 2),
('davidemilan', 2),
('matteocasonato', 2),
('matteomidena', 3),
('davidemilan', 3),
('matteocasonato', 3),
('matteomidena', 6),
('davidemilan', 6),
('matteocasonato', 6),
('matteomidena', 8),
('davidemilan', 8),
('matteocasonato', 8);


INSERT INTO saved_articles VALUES
('danilostojkovic', 1),
('matteomidena', 1),
('davidemilan', 1),
('matteocasonato', 2),
('matteomidena', 2),
('davidemilan', 3),
('matteocasonato', 3),
('matteomidena', 4),
('davidemilan', 5),
('matteocasonato', 6),
('matteomidena', 7),
('davidemilan', 6),
('matteocasonato', 8);
