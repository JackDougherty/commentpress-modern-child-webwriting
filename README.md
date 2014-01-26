Commentpress Modern Child Theme for WebWriting.trincoll.edu
===============================

This child theme for http://WebWriting.trincoll.edu is based on the responsive & mobile-friendly *CommentPress Modern Theme* bundled with *CommentPress Core* version 3.5+. Use it as a starter pack for creating your own variant on the parent theme.

You can install *CommentPress Core* from the [WordPress Plugin Directory](http://wordpress.org/plugins/commentpress-core/) or contribute to it via the [GitHub repository](https://github.com/IFBook/commentpress-core).

NOTE THIS UNRESOLVED ISSUE (as of 16 Sept 2013)

In the template > activity_sidebar.php, I wish to change line 49 from "Recent Comments in this Document" (the last word confuses readers) to "Recent Comments on this Book"

But I'm confused about how to override this in the functions.php, because it's not exactly parallel to the comment_form.php override that I previously did

What's the function called? Is it this?
commentpress_show_activity_tab

And how would I write the corresponding filter? Would it include this?
cp_tab_title_activity

For now, I'm fudging this solution by directly modifying the Modern theme, rather than my child-theme of it.
