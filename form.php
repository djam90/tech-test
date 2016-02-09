<form>
    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
        </tr>

        <?php foreach($people as $index => $person) : ?>
            <tr>
                <td><input type="text" name="people[<?=$index;?>][firstname]" value="<?=$person['firstname'];?>" /></td>
                <td><input type="text" name="people[<?=$index;?>][surname]" value="<?=$person['surname'];?>" /></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <input type="submit" value="OK" />
</form>
