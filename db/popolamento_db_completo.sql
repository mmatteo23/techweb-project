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
    'Every day, millions of players worldwide enter the battle as one of over a hundred Dota Heroes in a 5v5 team clash. Dota is the deepest multi-player action RTS game ever made and there’s always a new strategy or tactic to discover. It’s completely free to play and always will be – start defending your ancient now.',
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
);

INSERT INTO Article (id, title, subtitle, text, publication_date, cover_img, alt_cover_img, read_time, author, game_id) VALUES 
  (
    1,
    "WHAT IS THE FORTNITE PLAYER COUNT IN 2021?",
    "Fortnite has been a huge success since launching, attracting record player numbers and bringing in a lot of revenue for Epic games. Just how many players are actually behind this wild success though?",
    "<p>At certain times since release, Fortnite has had a pretty impressive player base. A lot of people wonder about the exact size of the Fortnite player count. It seems like the game is incredibly popular, although thereâ€™s often a feeling that it is past its peak.</p><p>Most game developers rarely release this kind of information. There is an exception to this though, every now again Epic release some very specific data on the Fortnite player base. This is typically when the player base or active players reaches some kind of all-time high. We can figure out a bit of a bigger picture of the player count from this data and some other sources. While it is sometimes decreasing, the Fortnite player count in 2021 is still impressive.</p><p><br data-cke-filler=\"true\"></p><h3>HOW MANY PEOPLE PLAY FORTNITE?</h3><p>Epic Games doesnâ€™t give entirely frequent or accurate pictures of how many people play Fortnite. We do have some metrics and measurements though for how many active players Fortnite has.</p><p>The first is the total amount of active accounts. We know that Fortnite had over 125 million players within a year of its release. It also seems that the total number of registered numbers is up to 350 million registered users. That is around 4% of the worldâ€™s population. Something about that fact probably doesnâ€™t seem right though, does it? Thatâ€™s because registered users are a pretty bad measure of the Fortnite player count.</p><p>The total registered users is just the total number of accounts created. This is by no means one per person. Lots of people have access to more than one Fortnite account, created accidentally or sometimes on purpose. On top of, if youâ€™re wondering is Fortnite loosing players then this is a factor too. Registered accounts arenâ€™t necessarily in use.</p><p>Even among big figures in Fortnite like the best Fortnite streamers or the top Fortnite pro players, have operated quite a few accounts under their own name. It might be against the rules, but that rule-breaking can be pretty brazenly flouted. Some players even start up a new account frequently to have a quick match with a lobby full of bots to practice. So registered users arenâ€™t a particularly helpful measure of how many people are actually playing.</p><p>In terms of how many are actually active and playing, there were 12.5 million playing concurrently in 2019. Fortniteâ€™s best ever month for player count was in 2018, when 78 million were actively playing in August. Additionally, back in December 2020, over 15.3 million players united to beat Galactus in a single-day event.</p>",
    "2021-05-14",
    "fortnite-player-count-number-of-players.jpg",
    "article image cover showing a lot of fortnite characters",
    10,
    "danilostojkovic",
    9
  ),
  (
    8,
    "CSGO MOVES &amp; RUMORS BEFORE THE NEW YEAR â€“ MAJOR ROSTER SHUFFLES COMING",
    "Ahhh, the post-CSGO Major roster shuffle. What a time. Those who failed to achieve victory are questioning themselves and if  their team is capable of greatness.",
    "<p>There are many still rumored yet to be confirmed. Amongst the most interesting rosters that are changing is Team Liquid. The</p><p>once powerhouse North American team has fallen to new lows with their current roster. A massive shuffle is needed and thatâ€™s</p><p>exactly what they are doing.</p><p><br data-cke-filler=\"true\"></p><h3>THE CONFIRMED</h3><p>Liquid has confirmed a few big changes so far. They have officially announced the removal of FalleN, Stewie2K and Grim from</p><p>their starting lineups. Two of the three rumored signings have proven to be true. oSee, who got his big break on HenryGâ€™s</p><p>Cloud9 roster, has now signed with TL. oSee has been showing good numbers in tier 2 playing on Extra salt, and has impressed</p><p>his peers in online ladder play. He will fill the role of AWPer, which TL has had a hard time filling with this past roster</p><p>with players passing the role back and forth.</p><p>The other big Liquid signing is shox. Though he has performed on an average level the last little while, he could be a good fit</p><p>for a support role Ã -la xyp9x, with his icy veins under pressure in the clutch. He is still one of the best players in the world</p><p>on LAN in 1vX situations. Since he is 29, he has been in every situation imaginable and has the tendency to make great plays. If</p><p>this is his last run on a tier 1 team, this is a good role for him to have. He may no longer have what it takes to be a star</p><p>player, but he has the knowledge and experience to contribute. This is the natural progression of a star CSGO player.</p><p>Over in Europe, TorbjÃ¸rn â€œmithRâ€ Nyborg departed MOUZ for a coaching gig at Apeks. Unicorns of Love, sAw and Into</p><p>the Breach all released their rosters, with everyone seeking to re-build at the start of the year.</p><p><br data-cke-filler=\"true\"></p><h3>THE SPECULATION</h3><p>Recently, 100 Thieves announced that they would be transferring nitr0 to an unknown team. After more than a year out of the game,</p><p>he will be likely returning to CSGO and potentially TL? EliGE continues to speak highly of him, saying he wants Nitro as his IGL.</p><p>Nitro was on Team Liquid during their peak when they won the Grand Slam back in 2019. TL would have been the best team in the</p><p>world if it hadnâ€™t been for the greatest team of all time, Astralis. Iâ€™m sure somewhere in the back of his mind Nitro thinks he</p><p>can get the team back to the heights at which they once were.</p><p>Meanwhile, MOUZ is looking at OGâ€™s Valdemar BjÃ¸rn VangsÃ¥ for their roster into the upcoming season. Astralis is rumored to be</p><p>looking at Heroic talent for their roster revamp. Plenty of teams are holding the cards close to their chest, and more â€œleaksâ€</p><p>should arrive in the second week of January.</p><p>Until then, happy new year and brace for a hectic CSGO offseason.</p>",
    "2021-12-21",
    "csgo-valde.jpg",
    "article image cover showing a Counter Strike Global Offensive team",
    5,
    "matteocasonato",
    6
  ),
  (
    2,
    "BEST SNIPERS IN WARZONE â€“ THE FIVE BEST SNIPERS FOR YOUR WARZONE LOUDOUTS",
    "Here is our take on the best snipers in Warzone, where we break down whatâ€™s the best sniper in warzone for the average COD operator.",
    "<p>The best snipers in Warzone may often be an elaborate topic for all you Call of Duty (COD) fans out there. After all, itâ€™s more than just crowning the highest damage weapons as the best snipers on warzone. Various factors can come into play, such as effective range, scope control and even bullet velocity, per se.</p><p><br data-cke-filler=\"true\"></p><h3>AX-50 â€“ THE BIG DADDY</h3><p>As its nickname suggests, the AX-50 lives up to its name as a deadly sniper rifle in the right hands. A headshot from this bad boy can guarantee a confirmed kill, putting the enemy forces at a massive disadvantage.</p><p>Coupled with its decent mobility, itâ€™s not as punishing as the other options on the list for the high damage output. Ideally, you would want to be using the AX-50 at mid-range clashes, where itâ€™s most effective. Although it does suffer from inaccurate aim down sights, this can be conveniently improved with attachments such as a Stippled Grip Tape, Tac Laser, and Singuard Arms Assassin.</p><p>The sniper role may often be synonymous with camping solo, but the AX-50 is built for more aggressive scenarios. Another reliable yet neglected alternative to mid-range combat is the SPR-208, which only a handful of seasoned players consider a deadlier Warzone sniper rifle.</p><p><br data-cke-filler=\"true\"></p><h3>HDR â€“ THE CLASSIC AWP</h3><p>For the traditional sniper players, the HDR brings the nostalgic feel of what sniper rifles should deliver. A devastating shot at a very long distance is achievable with the HDR since it has one of the most extended ranges.</p><p>While longer range leads to poor damage drop-off, the Monolithic Suppressor and 26.9â€ HDR Pro barrel attachments provide desirable countermeasures. Furthermore, using the higher-calibre FMJ bullets will provide improved bullet penetration, leaving no safe spots for enemies.</p><p>Yet, all these perks come at only the cost of mobility, so some map awareness will come in handy. Knowing when the enemy is approaching close and navigating a new viewpoint will be critical for sneaky long-ranged shooters.</p><p><br data-cke-filler=\"true\"></p><h3>KAR98K â€“ IF SNIPERS WERE MELEE WEAPONS</h3><p>Perhaps standing still during the entire match isnâ€™t your cup of tea, and you had rather be bumping into foes at every corner. Then, the KAR98K is your go-to for its quick scoping tactics.</p><p>The KAR98K recently received buffs, where it can effectively deliver confirmed headshot kills. This makes it quite literally a pocket sniper rifle, which you can use aggressively. Considering its close-range benefits, KAR98Kâ€™s damage drop-off is not negligible, so the Monolithic Suppressor will offer some decent range.</p><p>Nonetheless, itâ€™s still a sniper rifle that relies on oneâ€™s good aim, which is to consistently blow the enemyâ€™s head. Aiming anywhere else, protected by armor, will not only result in an unfatal shot but provide enemies some breathing room to flunk you out.</p><p><br data-cke-filler=\"true\"></p><h3>ZRG 20MM â€“ THE SNIPER MINIGUN</h3><p>Thereâ€™s definitely no denying that the vast majority of COD player base loves close-range combat. Hence, another good close-range alternative is the ZRG 20MM, notably for featuring the highest bullet velocity.</p><p>Alongside its minimal bullet drop, we have ourselves a trendy pick among veteran COD players and newcomers alike. After all, bullet drop mechanics is presumably complicated to master and requires longer scoping periods.</p><p>If COD Warzone had taught us anything, itâ€™s to rush into enemy frontlines without hesitation, so we highly recommend the ZRG 20MM for starters.</p><p><br data-cke-filler=\"true\"></p><h3>PELINGTON 703 â€“ YET ANOTHER â€˜MELEEâ€™ SNIPER</h3><p>Lastly, the Pelington 703 serves as a solid alternative to the KAR98K for aggressive adversaries. It utilizes fast scoping, which with some practice, can work like clockwork at consistently sending out shots.</p><p>As aforementioned, you should play around corners and close combat so that you get the perks from using the Pelington 703 for such scenarios. Now that we depicted the Pelington 703 as a quick loading rifle, the best attachments would be the 27.2â€ Combat Recon and Infiltrator Grip, which improves bullet speed and overall movement speed, making you a speed demon in the match.</p><p>We briefed about the best sniper Warzone has to offer, itâ€™s time to put them to the test. Do note that while these may be popular picks among COD players, there are still a vast array of weapons. So really, whatever secures you the most headshots would be your best snipers in Warzone to pick up.</p>",
    "2021-07-27",
    "Warzone-Sniper.jpg",
    "article image cover showing a a Warzone character using a sniper rifle",
    15,
    "danilostojkovic",
    12
  ),
  (
    4,
    "JD Gaming signs ADC Hope",
    "Looks like JDG is getting its Hope up.",
    "<p>Wang â€œHopeâ€ Jie will be JD Gamingâ€™s starting ADC for the 2022 LPL Spring Split, the team revealed last night. Hope will fill the vacancy left by Lee â€œLokeNâ€ Dong-wook, who left the squad earlier in the offseason.&nbsp;</p><p>The 21-year-old bottom laner has spent the vast majority of his career with EDward Gaming, playing with the organization for almost four years. During this time, Hope often weaved in and out of the main lineup, though he primarily played on EDGâ€™s development team, EDG Youth Team. Playing as a starter for EDward Gaming in 2020, Hope and the team found only middling results. He was a standout after returning to the organizationâ€™s development division in the LDL, despite his teams early finish in the Spring Playoffs.&nbsp;</p><p>Hope will get another shot at the LPL main stage during the 2022 Spring Splitâ€”this time, with another team. JDG is similarly looking to rebuild after a lackluster season. They took home the 2020 LPL Spring Split Playoffs and made a decent run at Worlds 2020, but failed to rekindle that success the following year. JDG had an underwhelming playoffs run in the 2021 Spring Split and missed the playoffs altogether in the Summer Split.&nbsp;</p><p>JDG is similarly looking to rebuild after a lackluster season. They took home the 2020 LPL Spring Split Playoffs and made a decent run at Worlds 2020, but failed to rekindle that success the following year. JDG had an underwhelming playoffs run in the 2021 Spring Split and missed the playoffs altogether in the Summer Split.</p>",
    "2022-01-01",
    "JD-Gaming-1024x576.webp",
    "article image cover showing JD Gaming",
    8,
    "davidemilan",
    1
  ),
  (
    3,
    "Arcane skyrockets Leagueâ€™s plays on Spotify",
    "Arcane brings an unprecedented rise for League of Legendâ€™s Spotify account.",
    "<p>League of Legendsâ€™ plays on Spotify in 2021 had a tremendous uptick in November and December, according to League Charts. And Riot Games and Netflixâ€™s Arcane has its share of responsibility. While January to October had monthly play counts ranging from 65 million to 99 million, the two final months of the year showed a radical improvement over the rest of the year, based on League Chartsâ€™ data.&nbsp;</p><p>The number of monthly streams jumped from 92 million in October to 221 million in November, when the League-inspired animated series Arcane launched. The month of December saw the highest volume of plays, rising by 100 million in just the span of a month and finishing at 327 million in total. November and December, the highest months in terms of activity, also marked the timespan for the showâ€™s first season. The official League Spotify account sits at an impressive 26,938,790 monthly listeners.&nbsp;</p><p>The top listened-to songs for League reinforce the idea that Arcane is responsible for this massive growth. â€œEnemy,â€ the title song for Arcane, sits at the current most popular song at 207,103,321 total plays. Other songs featured in the series, such as â€œPlaygroundâ€ and â€œGet Jinxed,â€ have also emerged among the accountâ€™s top-played songs.&nbsp;</p><p>In addition, the Arcane soundtrack has been making the rounds on Spotifyâ€™s Top Global albums, according to SpotifyCharts, and has ranked among the most popular albums worldwide for six consecutive weeks, making the list since Nov. 25. Riot Games has substantially increased production in its music division.&nbsp;</p><p>Outside of Arcane and League projects, Riot also began its Sessions initiative, which features fair use music inspired by characters of its games. So far with a session for Vi and Diana, the lengthy albums feature various artists and animations for their respective characters.&nbsp;</p><p>The rise in plays for League is a testament to the growth and sustained popularity of Arcane, as well as Riotâ€™s overall investment into music.</p>",
    "2022-01-02",
    "MTG-Arcane-Secret-Lair.jpg",
    "article image cover showing a moment from the Arcane show: Jayce and Viktor floating with magic",
    9,
    "davidemilan",
    1
  ),
  (
    5,
    "Prime Gaming page leaks new VALORANT agent",
    "This is a nice surprise to end the year.",
    "<p>VALORANT players got their first look at the upcoming agent on the VALORANT Prime Gaming loot page today, which featured an image of the new character that likely wasnâ€™t supposed to be posted yet.&nbsp;</p><p>A new VALORANT agent is always an exciting change since they can shake up the meta and breathe fresh life into the game. The agents are typically hinted at for months before being officially revealed, giving players Easter eggs and other cryptic hints to decipher.&nbsp;</p><p>The next agent is confirmed to be Filipino and will likely have an electricity-based kit, according to a recent blog post. The post also showed the agentâ€™s shoes and one of them had a streak of lightning beneath its sole. These updates gave fans a look at whatâ€™s to come without officially revealing the character, but a new Prime Gaming image has completely revealed the agent. Fans can visit the Prime Gaming VALORANT page to claim in-game items like sprays and gun buddies.&nbsp;</p><p>But the page briefly featured an image of a never-before-seen agent today, which is likely the new agent coming in 2022. The picture shows a character holding a Frenzy running past other agents, seemingly hinting at a speed-based ability. The characterâ€™s name or class has not been revealed, but this improved speed might hint at another duelist joining the game. Riot Games has not officially announced the new agent and itâ€™s unclear if this was an unintentional leak by Amazon. But fans can enjoy the last day of 2021 with a first look at the next agent coming to VALORANT.</p>",
    "2021-12-31",
    "FH9KQSOVUAIXVbN-1024x576.jpeg",
    "article image cover showing a random Valorant fan art",
    7,
    "davidemilan",
    2
  ),
  (
    6,
    "Everything that happened in Apex Legendsâ€™ lore in 2021",
    "From Fuse to Ash and everything in between.",
    "<p>This year was closer to a decade in the lore of Apex Legends. Fans got to see an avalanche of storylines with new and old legends alikeâ€”and thatâ€™s even before taking into account the 208-page lore book Respawn Entertainment released in February. A lot happened in Apex even outside of Pathfinderâ€™s Quest.&nbsp;</p><p>Respawn gave fans four new challengers, a new map, and stronger links to Titanfall than ever with the arrivals of Valkyrie and Ash. The season nine quest, The Legacy Antigen, had two parallel storylinesâ€”both essential to setting up key developments for some of the legends and for the big-picture lore. Itâ€™s easy to feel lost with so many arcs and narratives happening throughout the year. Hereâ€™s a rundown of the major story events that took place in Apex in 2021. Season eight: Fuse, Armageddon, and a lot of arm puns.&nbsp;</p><p>Our first legend of 2021 came in with a blast. Walter â€œFuseâ€ Fitzroy, Apexâ€˜s Explosives Enthusiast, joined the Apex Games in season eight hailing from the planet Salvo. His planet had been fighting off the Syndicateâ€™s advances for decades, but this resistance created a fickle balance of power with several warlords gunning for the crown. Despite Salvoâ€™s refusal to join the Syndicate when the Outlands Civil War ended in 2722, the planet backtracked and signed the Treaty with the Syndicate over a decade later. Salvo joining Syndicate space made Fuse, the Bonecage Champion, eligible to compete in the Apex Games. Of course, this brought the anger of diehard Syndicate opponent and Fuseâ€™s childhood friend, Margaret â€œMad Maggieâ€ KÅhere. Fuseâ€™s arrival came in with a storyline of his own.&nbsp;</p><p>For the season eight quest, Armageddon, the legends took on Mad Maggie after she attacked Kings Canyon. This insular storyline ended with Maggieâ€™s perceived death. Maggie attacked Fuse and the explosion sent them both flying. They held onto a ledge, but she let go and dropped to her presumed demise. Armageddon didnâ€™t have a tremendous impact on the rest of the story, at least for now, but it set up important development for Fuse. In addition to the quest, Respawn published two important pieces of information on Twitter.&nbsp;</p><p>The first was the two-part comic involving Caustic and Wattson, which related to the scientistâ€™s plans to gas Solace and how Wattson defused his attempt. The other relates to Wraith and Bangalore and kicks off an important arc that would reappear in the following season, The Legacy Antigen. Weâ€™ve covered those in more detail in our season eight lore recap. Pathfinderâ€™s Quest and â€œThe Truthâ€.&nbsp;</p><p>Pathfinderâ€™s Quest was arguably the most significant part of Apex lore in 2021. The 208-page book gives out several details about the Outlands, the Syndicate, and the Frontier War, and helps shed some light on what happened to the universeâ€”and the legendsâ€”in the 18 years between the end of the Frontier War and Apex. The book also revealed the answers to a handful of mysteries in one go, including the identity of Pathfinderâ€™s creatorâ€”or rather, creators. Pathfinder was created by The Group, a cluster of scientists tasked with solving the Outlandsâ€™ energy crisis in the late 2650s. It was the same energy crisis Horizon identified years prior and The Group was looking for a way to refine Branthium, as discovered by Horizon. The ending of Pathfinderâ€™s Quest was turned into an official short called â€œThe Truth,â€ made by GoldenLane Studios.&nbsp;</p><p>It recounts the most important moments: How Dr. Reid turned on The Group, how Pathfinderâ€™s creators saved the Outlands by rerouting the Branthium, and their grim fates. For those who didnâ€™t read Pathfinderâ€™s Quest, this short is essential to understanding the storyline between Horizon, Dr. Reid, and Ash. Season nine: Valkyrie, Blisk, and Legacy. Apexâ€™s ninth season is a blast from the past. Titanfall 2 players are familiar with the horrifying noise of Viperâ€™s Flight Core during the boss fight. Now, they can meet his daughterâ€”and the skies belong to her. Valkyrie made a Titan-sized impression when she landed in the Apex Games in season nine. She blamed Kuben Blisk, the former leader of the Apex Predators and current Apex Games commissioner, for her fatherâ€™s death. Blisk gave her a chance to start anew and away from the shadow of her father: a card to the Apex Games.&nbsp;</p><p>This brought Valkyrie into the fray, but it was part of The Legacy Antigen, Apexâ€™s longest quest so far. This two-part quest set up tremendously important arcs for several characters. Weâ€™ve covered it in detail in our dedicated Legacy Antigen recap. Season 10: The emergence of Seer. If Valkyrie brought strong ties to Titanfall, her successor came out of nowhereâ€”but that doesnâ€™t mean he didnâ€™t steal fansâ€™ hearts. Seer, the Ambush Artist from Boreas, made his way to the Apex Games from the Arenas and the build-up to his release was as unique as him. Instead of outright announcing the new legend, Respawn teased Seer with a folk tale called The Moth and the Flame, which told of a curse. This story turned out to be part of Boreas folklore and helped explain why Seerâ€™s community believed he was cursed.&nbsp;</p><p>The night he was born, an asteroid shattered the planetâ€™s moon and they took it as an ill omen. Seer is about rising past that perceived curse. In a season 10 loading screen, he said flaws or curses are what make people strong and unique, as long as they define that curse themselves and donâ€™t let others define it for them. The artist is the embodiment of that principle, taking ownership of this curse and turning it into part of his persona. â€œThe boy born under a bad omen and a terrible myth has taken this tale and created an even greater legend. He is Seerâ€” an icon of the shunned, the unaccepted, and the unabashedly original,â€ his bio says. Bloodhoundâ€™s Chronicle. Though season 10 was mostly light on lore, fans also had a â€œbite-sizedâ€ chronicle starring Bloodhound. The Technological Tracker confronted their guilt over several of their shortcomingsâ€”and eventually overcame it. This in-game story event had players follow the White Raven, a manifestation of Bloodhoundâ€™s guilt.&nbsp;</p><p>The animal taunted Bloodhound over their failures, and in the epilogue, it points out several moments where the legend perceives their failure. â€œYou are no BlÃ³dhundr,â€ the White Raven says. â€œYou are a failure. You failed your mÃ³Ã°ir and faÃ°ir. You failed Boone. You failed your people. You failed your home.â€ Bloodhound, however, realizes those shortcomings werenâ€™t necessarily their fault. â€œMy parents, Booneâ€¦ to taka responsibility for all is to taka the power of the gods,â€ Bloodhound says. â€œI am no god. And I am not nothing. I am BlÃ³dhundr.â€ The Chronicle ended with Bloodhound rising past the darkness of their perceived failures, coming out owning the title of BlÃ³dhundrâ€”and presumably forgiving themself and shedding the lionâ€™s share of guilt from those situations. Bangalore teasers. By the end of season 10, fans were excited about what new stories could be brewing on the horizonâ€”and Respawn was happy to give them a taste. A series of Bangalore teasers at the tail end of Emergence showed the crash site of the IMS Hestia, the ship in which Bangalore and her brother Jackson were stationed for years after the battle of Gridiron.&nbsp;</p><p>Though everyone believed Jackson was dead, Bangalore knew heâ€™s alive and sheâ€™s trying her hardest to find him. The teasers pointed to somewhere called Storm Point, in Gaea. Though it gave fans a glimpse of a new arena in the next season, the weeks that followed brought far more than just a new venue for the Apex Games. Horizon wakes up a simulacrum. A series of Twitter comics signaled the build-up to Ashâ€™s arrival as a contestant in the Apex Games. Horizon was still looking for answers for the whereabouts of her son and she believed Ash could know about that. To Horizon, Ash was the simulacrum version of her old friend, Lilian Peck, the founder of Olympus. She couldnâ€™t have been more wrong. After the season five quest, when the legends assembled Ash, Hammond Robotics took the Olympus access codes out of Ashâ€™s memory banks.&nbsp;</p><p>Horizon believed the only person who could know those was Lilian, and therefore, Ash would have to be Lilian Peck. Horizon set off to figure out how to â€œwake upâ€ Ash and break the illusion she was a simulacrum, so she runs to the only being with that experience: Revenant. The immortal murder robot lets it slip that newer simulacra have special codes that will trigger the process and Crypto provides her with the necessary codes. Horizon goes to read the access codes to Ash, but Revenant sneaked behind her and tried to keep Ash from seeing a similar fate as him. Horizon manages to read the sequence and successfully â€œwakes upâ€ Ash. But sheâ€™s not who Horizon thought she was.&nbsp;</p><p>This moment set off the storyline for the next season, including Ashes to Ashes, Ashâ€™s episode of Stories from the Outlands. Season 11: Escape, Ash, and Storm Point. Ash has had one of the longest build-ups to her release in Apex history so farâ€”and thatâ€™s even if you donâ€™t count the two and a half years (and roughly two in-universe decades) between Titanfall 2 and Apex. Ash appeared as the artifact the legends assembled in The Broken Ghost and has been a part of the lore ever since.&nbsp;</p><p>Ashâ€™s arrival also touches on Horizonâ€™s long-running story arc after Respawn revealed what fans had suspected for nearly a year: that Ash was in fact Dr. Reid, Horizonâ€™s assistant who left her stranded in space. As Dr. Ashleigh Reidâ€™s body was dying after the events of Pathfinderâ€™s Quest in 2658, Hammond Robotics personnel saved her by turning her into a simulacrum. The trauma from the experienceâ€”both the imminent death and the simulacrum processâ€”split her into two different personalities, Ash and Leigh. Ash takes control most of the time and is the cutthroat mercenary fans saw in Titanfall 2. Leigh is dormant, though she appears in specific moments and in some in-game quips.</p><p>Leigh knows what happened to Horizonâ€™s son, Newton. Reid seemed to be one of the few people to know he left the lab before the explosion, but he was presumed dead. Leigh wants to tell Horizon what she knows. Ash wonâ€™t let her. This dilemma kicked off a significant part of the story this season and is running through the seasonal quest, Trouble in Paradise. Thatâ€™s the brunt of the lore so far, but thatâ€™s not all. Escape also introduced fans to the tropical paradise of Storm Point in Gaea, a paradisiac and derelict island. The former IMC base was abandoned when the Corporation pulled out of the Outlands and also by the people of Gaeaâ€”until the Syndicate found it, that is.&nbsp;</p><p>Storm Point still houses several secrets that will likely surface next year. The remains of Bangalore and Jacksonâ€™s ship, the IMS Hestia, are a Storm Point POI called Shipfall and it could eventually serve as another plot point for that story arc. Additionally, Wattson, Crypto, and Wraith are looking to rebuild a computer, according to the Paquette Repair Service loading screen. The season 11 quest, Trouble In Paradise, promises to set up major developments for Ash, Leigh, Horizon, and Apexâ€™s big-picture lore. And thatâ€™s even before taking into account the four new legends (and possibly a new map) that will release throughout the year. With so many loose ends and still a fair share of the season quest to go, Apex lore shows great promise in 2022â€”as seen by brilliant storytelling throughout this year.</p>",
    "2021-12-29",
    "ash-2-1024x539.webp",
    "article image cover showing a character from Apex Legends",
    20,
    "davidemilan",
    4
  ),
  (
    7,
    "HUYA DOTA2 INVITATIONAL 2021 FINALS PREDICTION AND MATCH ANALYSIS",
    "Itâ€™s been an incredible showing of Dota 2 talents at the Huya Dota2 Invitational.",
    "<p>Southeast Asia representative, OB.Neon surprised everybody with unexpected victories over the Chinese rivals. Notably,</p><p>they defeated team Royal Never Give Up and the famed Invictus Gaming to secure their position as grand finalists.</p><p>On the contrary, OB.Neon is at the brim of elimination in the Dota Pro Circuit 2021-22 (DPC2021-22) SEA region. Hence, we</p><p>were reasonably baffled by OB.Neonâ€™s unexpectedly great run at the Huya Dota2 Invitational 2021.</p><p><br data-cke-filler=\"true\"></p><h3>INVICTUS GAMING VS ROYAL NEVER GIVE UP (LOWER BRACKET FINAL)</h3><p>With OB.Neonâ€™s newfound victory over IG, the fans are divided even further on which Chinese powerhouse to side. On one hand,</p><p>IG is the Singapore Major champ and maintained a dominating form even in the International 10 (TI10). Thereâ€™s no denying that</p><p>IG is arguably the most synchronized team in the market, as they have great team morale.</p><p>Whereas RNG rose to our expectations as a hot candidate to debut at the DPC2021-22. Housing several former PSG.LGD players and</p><p>other high-profile players, RNGâ€™s current line-up looked significantly better than the trainwreck, Team Elephant. On paper,</p><p>both teams are formidable, so their match odds of approximately x1.85 odds reflects that.</p><p><br data-cke-filler=\"true\"></p><h3>MATCH PICKS, BANS &amp; STRATEGIES</h3><p>While the general odds are relatively even, there are exotic betting markets that may look enticing. Before that, letâ€™s talk</p><p>drafts and strategies.</p><p>IG heavily relies on big team fight combos, which is an understatement since IG excels in initiations into clean teamwipes.</p><p>Their midlaner, Zhou â€œEmoâ€ Yi is essentially IGâ€™s sole playmaker, alongside both supports providing counter initiations and</p><p>saving mechanisms. We will certainly see Void Spirit or Ember Spirit picks for Emo, but thatâ€™s assuming their opponent isnâ€™t</p><p>already opting for heavy lockdowns.</p><p>We saw OB.Neon effectively forced Emo to play outside his typical hero pool. This compromise was arguably what led to IGâ€™s</p><p>downfall during the earlier upper bracket final. Hence, expect multiple long-range saving supports, such as Weaver and Abaddon.</p><p>Meanwhile, RNG opts for aggressive playstyles that often snowball well into the midgame. Itâ€™s a standard playstyle, that would</p><p>work most of the time if their opponent wasnâ€™t an elusive player. Against IG however, team RNG will most certainly need to</p><p>re-evaluate their plans. Nevertheless, expect Lu â€œSomnusä¸¶Mâ€ Yao to play his signature picks, mostly aggressive carries,</p><p>such as Bloodseeker, Leshrac, or Broodmother if heâ€™s feeling adventurous.</p><p>These heroes will force IGâ€™s reaction as it would be impossible to ignore Somnus asserting dominance over the enemy territory.</p><p><br data-cke-filler=\"true\"></p><h3>MATCH PREDICTIONS AND ODDS</h3><p>Reviewing their playstyles, itâ€™s evident that these teams love their teamfights, which of course means massacre. Albeit we will have</p><p>to side RNG on this match even though IG is the more seasoned team.</p><p>The death counter can increase drastically as the game progresses due to IGâ€™s aggression. Total kills can reach well over 55.5</p><p>kills, which gives a decent x3.12 return. Another consideration is the match duration, which seems to average at over 40.5</p><p>minutes, rewarding x3.32 returns.</p><p>Special markets, such as â€œFirst Blood, Destroy First Tower, Kill First Courier and Win Mapâ€ can be a fun bet since it returns</p><p>x7.00 winnings. RNG is a good candidate for this particular bet since their aggressive draft calls for easy first blood,</p><p>quicker pushing capabilities, and win the map. Thereâ€™s no doubt that itâ€™s indeed a difficult task, but considering its multi-fold</p><p>returns, itâ€™s worth the leap of faith.</p><p>Consider the â€œFirst Blood and Win Mapâ€ market in favor of RNG too. At a decent x3.06 return, itâ€™s an easier alternative to the</p><p>previous market and has a higher chance of occurrence. These odds make for a great betting slip together and are exclusively</p><p>available on GG.bet.</p><p><br data-cke-filler=\"true\"></p><h3>OB.NEON VS ROYAL NEVER GIVE UP â€“ GRAND FINAL (UPDATED)</h3><p>OB.Neon could pull off a win at the Huya Dota2 Invitational 2021, if they best RNG in their drawn out games. While OB.Neon have</p><p>proven their strength by taking down both RNG and IG before, it still easy to win a best of series versus any Chinese team.</p><p>The grand final is an excruciating best-of-five series, so thereâ€™s certainly less room for mere flukes. Expect more then 4 games</p><p>for sure in these series, and average game times longer then 30 minutes.</p>",
    "2021-12-31",
    "dota-huya-invitational.jpg",
    "article image cover showing a Dota 2",
    8,
    "matteocasonato",
    7
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
(12,4);


INSERT INTO Tag(name) VALUES 
('tournament'), 
('flash'), 
('scandalous');

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
(3, 8);

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
