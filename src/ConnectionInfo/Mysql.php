<?php

namespace Datahouse\Libraries\Database\ConnectionInfo;

/**
 * Simple structure keeping connection information for a MySQL Database.
 *
 * @author Markus Wanner <markus@bluegap.ch>
 * @copyright (c) 2015-2019 Datahouse AG, https://www.datahouse.ch
 * @license MIT
 */
class Mysql extends NetworkConnectionInfo
{
    const PDO_IDENTIFIER = "mysql";

    /**
     * Returns the MySQL default port.
     *
     * @return int
     */
    public function getDefaultPort()
    {
        return 3306;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return 'mysql';
    }

    /**
     * @return string
     */
    public function getPdoIdentifier()
    {
        return self::PDO_IDENTIFIER;
    }

    /**
     * @return array all info ready to be passed to a PDO constructor
     */
    public function asPdoConstructorArgs()
    {
        assert(isset($this->client_encoding));
        $enriched_dsn = $this->getDSN()
            . ';charset=' . $this->client_encoding;
        return [$enriched_dsn, $this->username, $this->password];
    }
}
