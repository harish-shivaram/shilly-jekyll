def get_git_mdate(src)
  path = File.dirname(src)
  file_name = File.basename(src)
  tstamp = `cd #{path}; git log -n 1 --format="%ct" -- "#{file_name}"`.chomp
  return $?.success? && !tstamp.empty? ? Time.at(tstamp.to_i) : nil
end

# Sets the mdate of the created file to match its parent
Jekyll::Hooks.register :pages, :post_write do |page|
  src = File.expand_path(page.path)
  dest = page.destination("")
  git_mdate = get_git_mdate(src)
  if File.exist?(src)
    FileUtils.touch dest, :mtime => git_mdate.nil? ? File.mtime(src) : git_mdate
  end
end

Jekyll::Hooks.register :documents, :post_write do |page|
  src = File.expand_path(page.path)
  dest = page.destination("")
  git_mdate = get_git_mdate(src)
  if File.exist?(src)
    FileUtils.touch dest, :mtime => git_mdate.nil? ? File.mtime(src) : git_mdate
  end
end

