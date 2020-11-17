# Option 1
The first thing to do is to invoke git to start an interactive rebase session:

>git rebase --interactive HEAD~N

Or, shorter:

>git rebase -i HEAD~N

where N is the number of commits you want to join, starting from the most recent one. For example, this is a hypothetical list of commits taken from the git log command, while I'm working on a generic feature Z:

>871adf OK, feature Z is fully implemented      --- newer commit
0c3317 Whoops, not yet...
87871a I'm ready!
643d0e Code cleanup
afb581 Fix this and that
4e9baa Cool implementation
d94e78 Prepare the workbench for feature Z
6394dc Feature Y                               --- older commit

And this is what I would like to do:

>871adf OK, feature Z is fully implemented      --- newer commit --┐
>0c3317 Whoops, not yet...                                         |
>87871a I'm ready!                                                 |
>643d0e Code cleanup                                               |-- Join these into one
>afb581 Fix this and that                                          |
>4e9baa Cool implementation                                        |
>d94e78 Prepare the workbench for feature Z     -------------------┘
>6394dc Feature Y                               --- older commit

Obtaining:
>84d1f8 Feature Z                               --- newer commit (result of rebase)
>6394dc Feature Y                               --- older commit

Notice how a rebase generates a new commit with a new hash (84d1f8 in the example above). So in this case the command would be:

> git rebase --interactive HEAD~[7]
because I want to combine the last seven commits into one, and d94e78 Prepare the workbench for feature Z is the seventh one.

# Option 2

I have tons of commits to squash, do I have to count them one by one?
A downside of the git rebase --interactive HEAD~[N] command is that you have to guess the exact number of commits, by counting them one by one. Luckily, there is another way:

>git rebase --interactive [commit-hash]
Where [commit-hash] is the hash of the commit just before the first one you want to rewrite from. So in my example the command would be:

>git rebase --interactive 6394dc
Where 6394dc is Feature Y. You can read the whole thing as:

Merge all my commits on top of commit [commit-hash].

Way easier, isn't it?

Step 2: picking and squashing
At this point your editor of choice will pop up, showing the list of commits you want to merge. Note that it might be confusing at first, since they are displayed in a reverse order, where the older commit is on top. I've added --- older commit and --- newer commit to make it clear, you won't find those notes in the editor.

>pick d94e78 Prepare the workbench for feature Z     --- older commit
pick 4e9baa Cool implementation 
pick afb581 Fix this and that  
pick 643d0e Code cleanup
pick 87871a I'm ready! 
pick 0c3317 Whoops, not yet... 
pick 871adf OK, feature Z is fully implemented      --- newer commit

[...]
Below the commit list there is a short comment (omitted in my example) which outlines all the operations available. You can do many smart tricks during an interactive rebase, let's stick with the basics for now though. Our task here is to mark all the commits as squashable, except the first/older one: it will be used as a starting point.

You mark a commit as squashable by changing the word pick into squash next to it (or s for brevity, as stated in the comments). The result would be:

>pick d94e78 Prepare the workbench for feature Z     --- older commit

>s 4e9baa Cool implementation 

>s afb581 Fix this and that  

>s 643d0e Code cleanup

>s 87871a I'm ready! 

>s 0c3317 Whoops, not yet... 

>s 871adf OK, feature Z is fully implemented      --- newer commit

[...]
Save the file and close the editor.

Step 3: Create the new commit
You have just told Git to combine all seven commits into the the first commit in the list. It's now time to give it a name: your editor pops up again with a default message, made of the names of all the commits you have squashed.

You can leave it as it is and the commit message will result in a list of all the intermediate commits, as follows:

>Prepare the workbench for feature Z
Cool implementation 
Fix this and that  
Code cleanup
I'm ready! 
Whoops, not yet... 
OK, feature Z is fully implemented

Usually I don't care to keep such information, so I wipe out the default message and use something more self-explanatory like Implemented feature Z.

Stackoverflow - Git rebase interactive the last n commits (https://stackoverflow.com/questions/41464752/git-rebase-interactive-the-last-n-commits)
Stackoverflow - How can I merge two commits into one? (https://stackoverflow.com/questions/2563632/how-can-i-merge-two-commits-into-one)
Gitready - Squashing commits with rebase (Stackoverflow - Git rebase interactive the last n commits 
https://www.internalpointers.com/post/squash-commits-into-one-git
