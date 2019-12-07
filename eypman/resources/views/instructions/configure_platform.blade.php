Platform configuration
<pre>
mkdir -p /opt/eypconf/id/
echo "eypman/{{ $user->slug }}_{{ $platform->slug }}" > /opt/eypconf/id/platformid
echo "{{ $platform->eypconf_magic_hash }}" > /opt/eypconf/id/.magic
</pre>
